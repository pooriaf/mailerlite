<?php

namespace App\Repositories\Eloquent;

use App\Models\Subscriber;

/**
 * Class SubscriberRepository
 * @package App\Repositories\Eloquent
 */
class SubscriberRepository extends BaseRepository
{
    /**
     * SubscriberRepository constructor.
     * Injecting related model
     *
     */
    public function __construct()
    {
        parent::__construct(new Subscriber());
    }

    /**
     * Get all subscribers including custom fields
     *
     * @param int $number
     * @return mixed
     */
    public function getAll($number = 10)
    {
        return $this->model->with(['fields' => function ($query) {
            $query->select('fields.title', 'fields.type', 'field_subscriber.value');
        }])->paginate($number);
    }

    /**
     * Update a subscriber and returns a fresh model
     *
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

    public function getFull($id)
    {
        return $this->model->where('id', $id)->with(['fields' => function ($query) {
            $query->select('fields.title', 'fields.type', 'field_subscriber.value');
        }])->firstOrFail();
    }
}