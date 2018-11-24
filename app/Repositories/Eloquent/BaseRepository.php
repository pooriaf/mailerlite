<?php

namespace App\Repositories\Eloquent;
/**
 * It is inspired of repository pattern
 * Class BaseRepository is a way to have base reusable methods for all repository classes
 */
abstract class BaseRepository
{

    /**
     * @var Eloquent Model
     */
    public $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model = null)
    {
        $this->model = $model;
    }

    /**
     * Call to get all items in a paginated form with defaults
     *
     * @param int $number
     * @return mixed
     */
    public function getAll($number = 10)
    {
        return $this->model->paginate($number);
    }
}