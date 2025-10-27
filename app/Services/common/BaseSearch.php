<?php

namespace App\Services\common;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use InvalidArgumentException;

class BaseSearch
{
    protected $model;
    protected array $fields;
    protected bool $with_trashed;

    protected function setModel($model)
    {
        if (is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
            if (is_object($model)) {
                $this->model = $model;
            } else {
                $this->model = new $model();
            }
        } else {
            throw new InvalidArgumentException('Указанный класс должен быть наследником Illuminate\Database\Eloquent\Model');
        }
    }

    protected function setFields(array $fields)
    {
        $this->fields = $fields;
    }

    protected function setWithTrashed(bool $with_trashed): void
    {
        $this->with_trashed = $with_trashed;
    }

    public function __construct($model, array $fields, bool $with_trashed = false)
    {
        $this->setModel($model);
        $this->setFields($fields);
        $this->setWithTrashed($with_trashed);
    }

    /**
     * Поиск по параметрам запроса
     *
     * @return LengthAwarePaginator
     */
    public function search(): LengthAwarePaginator
    {
        $query = $this->model
            ->select('*')
            ->when(true, function ($query) {
                return $this->getSearchByFields($query, request());
            })
            ->when($input = request()->input('q'), function ($query) {
                return $this->getQuery($query, request());
            })
            ->when($sort = request()->input('sort'), function ($query, $sort) {
                return $this->getSort($query, $sort);
            })
            ->when($this->with_trashed, function ($query) {
                $query->withTrashed();
            });

        return $query->paginate(request()->per_page);
    }

    /**
     * Получение параметров сортировки
     *
     * @param $query
     * @param $sort
     * @return mixed
     */
    protected function getSort($query, $sort)
    {
        $sortField = Str::startsWith($sort, '-') ? Str::substr($sort, 1) : $sort;
        if (!array_key_exists($sortField, $this->fields)) {
            return $query;
        }
        $sortDirection = Str::startsWith($sort, '-') ? 'DESC' : 'ASC';
        $sortColumn = $this->fields[ltrim($sort, '-')];

        return $query->orderBy($sortColumn, $sortDirection);
    }

    /**
     * Получение общего поиска по всем параметрам
     *
     * @param $query
     * @param $request
     * @return mixed
     */
    protected function getQuery($query, $request)
    {
        $input = $request->input('q');

        if (!$input) {
            return $query;
        }

        $query->where(function ($query) {
            foreach ($this->fields as $field) {
                $query->orWhere($field, 'LIKE', '%' . request()->input('q') . '%');
            }
        });

        return $query;
    }

    /**
     * Получение поиска по полям
     *
     * @param $query
     * @param $request
     * @return mixed
     */
    protected function getSearchByFields($query, $request)
    {
        $inputs = $request->all();
        $fields = $this->fields;

        if (!count($inputs)) {
            return $query;
        }

        foreach ($inputs as $key => $input) {
            if (array_key_exists($key, $this->fields)) {
                if (is_array($input)) {
                    $query->whereIn($fields[$key], $input);
                } else {
                    $query->where($fields[$key], 'LIKE', '%' . $input . '%');
                }
            }
        }

        return $query;
    }
}
