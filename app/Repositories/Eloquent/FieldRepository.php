<?php

namespace App\Repositories\Eloquent;

use App\Models\Field;

/**
 * Class FieldRepository
 * @package App\Repositories\Eloquent
 */
class FieldRepository extends BaseRepository
{
    /**
     * FieldRepository constructor.
     * Injecting related model
     *
     */
    public function __construct()
    {
        parent::__construct(new Field());
    }

    /**
     * Get all subscribers including custom fields
     *
     * @param $items
     * @return mixed
     */
    public function getFields($items)
    {
        return $this->model->whereIn('title', $items)->get();
    }


    /**
     * Get all subscribers including custom fields
     * Update a field and returns a fresh model
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateInfo($id, $data)
    {
        $model = $this->model->where('id', $id)->firstOrFail();
        $model->update($data);
        return $model->fresh();
    }

}