<?php

namespace App\Http\Controllers\API\laravel_crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\laravel_crud\ListTaskCreateRequest;
use App\Http\Requests\API\laravel_crud\ListTaskUpdateRequest;
use App\Models\laravel_crud\ListTask;
use App\Http\Resources\laravel_crud\ListTaskResource;
use App\Services\laravel_crud\ListTaskService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Services\common\BaseSearch;
use Illuminate\Http\Response;

class ListTaskController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $data = new BaseSearch(
            ListTask::class,
            [
                'id'          => 'id',
                'title'       => 'title',
                'description' => 'description',
                'status'      => 'status',
            ]
        );

        return ListTaskResource::collection($data->search());
    }

    public function show(int $id): ListTaskResource
    {
        return new ListTaskResource(ListTask::findOrFail($id));
    }

    public function store(ListTaskCreateRequest $request): ListTaskResource
    {
        $model = (new ListTaskService())->store($request->validated());
        return new ListTaskResource($model);
    }

    public function update(ListTaskUpdateRequest $request, int $id): ListTaskResource
    {
        $model = (new ListTaskService())->update($request->validated(), $id);
        return new ListTaskResource($model);
    }

    public function destroy(int $id)
    {
        ListTask::findOrFail($id)?->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
