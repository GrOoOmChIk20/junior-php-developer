<?php

namespace App\Services\laravel_crud;

use App\Models\laravel_crud\ListTask;

class ListTaskService
{
    public function store($validated): ListTask
    {
        $model = new ListTask();

        $model->fill($validated);

        $model->save();

        return $model;
    }

    public function update($validated, int $id): ListTask
    {
        $model = ListTask::whereNull('deleted_at')->findOrFail($id);

        $model->fill($validated);

        $model->save();

        return $model;
    }

}
