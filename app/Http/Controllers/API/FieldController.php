<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FieldRequest;
use App\Http\Requests\FieldUpdateRequest;
use App\Http\Resources\FieldCollection;
use App\Http\Resources\FieldResource;
use App\Repositories\Eloquent\FieldRepository;

/**
 * Class FieldController
 * @package App\Http\Controllers\API
 */
class FieldController extends Controller
{
    /**
     * @var FieldRepository
     */
    private $fieldRepository;

    /**
     * FieldController constructor.
     * @param FieldRepository $fieldRepository
     */
    public function __construct(FieldRepository $fieldRepository)
    {
        $this->fieldRepository = $fieldRepository;
    }


    /**
     * Display a listing of the fields.
     *
     * @return FieldCollection
     */
    public function index()
    {
        $fields = $this->fieldRepository->getAll();
        return (new FieldCollection($fields))->response()->setStatusCode(200);
    }

    /**
     * Store a newly created field in storage.
     *
     * @param FieldRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(FieldRequest $request)
    {
        $newField = $this->fieldRepository->model->create($request->validated());
        return (new FieldResource($newField))->response()->setStatusCode(201);
    }

    /**
     * Update the specified field in storage.
     *
     * @param $fieldId
     * @param FieldUpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($fieldId, FieldUpdateRequest $request)
    {
        $updatedField = $this->fieldRepository->updateInfo($fieldId, $request->validated());
        return (new FieldResource($updatedField))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified field from storage.
     *
     * @param $fieldId
     * @return \Illuminate\Http\Response
     */
    public function destroy($fieldId)
    {
        $this->fieldRepository->model->destroy($fieldId);
        return response()->make('', 200);
    }
}
