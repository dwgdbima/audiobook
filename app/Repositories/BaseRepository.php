<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\Repository\InvalidModelClassException;
use App\Contract\Repository\BaseRepositoryInterface;
use App\Traits\Crudable;
use App\Traits\Queryable;


abstract class BaseRepository implements BaseRepositoryInterface
{
    use Crudable, Queryable;

    /**
     * Class of the model repository works with
     *
     * @var string
     */
    protected $modelClass;

    /**
     * Model instance
     *
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @throws InvalidModelClassException
     */
    public function __construct()
    {
        $this->resolveModelEntity();
    }

    /**
     * Get the model of current repository
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Resolve model entity if it is valid
     *
     * @return void
     * @throws InvalidModelClassException
     */
    protected function resolveModelEntity(): void
    {
        if (is_null($this->modelClass)) {
            throw new InvalidModelClassException('Model class is null');
        }

        $this->model = resolve($this->modelClass);

        if (!$this->model instanceof Model) {
            throw new InvalidModelClassException("{$this->modelClass} is not an instance of Model");
        }
    }

    /**
     * Resolve model by key or return the model instance back
     *
     * @param $keyOrModel
     * @return Model
     */
    protected function resolveModel($keyOrModel): Model
    {
        return !$keyOrModel instanceof Model
            ? $this->findOrFail($keyOrModel)
            : $keyOrModel;
    }
}