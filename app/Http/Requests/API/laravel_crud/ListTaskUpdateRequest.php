<?php

namespace App\Http\Requests\API\laravel_crud;

use App\Http\Requests\APIFormRequest;

class ListTaskUpdateRequest extends APIFormRequest
{
    public function rules(): array
    {
        return [
            'title'       => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'max:255',
            ],
            'status'      => [
                'required',
                'string',
                'max:50',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'       => 'Заголовок обязателен для заполнения.',
            'description.required' => 'Описание обязателено для заполнения.',
            'status.required'      => 'Статус обязателен для заполнения.',

            'title.max'            => 'Заголовок не должен превышать :max символов.',
            'description.max'      => 'Описание не должно превышать :max символов.',
            'status.max'           => 'Статус не должен превышать :max символов.',
        ];
    }
}
