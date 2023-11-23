<?php

namespace App\Contract\Repository;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\LazyCollection;
use App\Exceptions\WrongSearchParametersException;

interface BaseRepositoryInterface
{
    /**
     * Create model with data
     *
     * @param array $data
     * @return Model|null
     */
    public function create(array $data): ?Model;

    /**
     * Insert records
     *
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool;

    /**
     * Update model
     *
     * @param Model|mixed $keyOrModel
     * @param array $data
     * @return Model|null
     */
    public function update($keyOrModel, array $data): ?Model;

    /**
     * Update or create model
     *
     * @param array $attributes
     * @param array $data
     * @return Model|null
     */
    public function updateOrCreate(array $attributes, array $data): ?Model;

    /**
     * Delete model
     *
     * @param Model|mixed $keyOrModel
     * @return bool
     * @throws Exception
     */
    public function delete($keyOrModel): bool;

    /**
     * Find model by PK
     *
     * @param int|string $key
     * @return Model|null
     */
    public function find($key): ?Model;

    /**
     * Find or fail by primary key or custom column
     *
     * @param $value
     * @param string|null $column
     * @return Model
     */
    public function findOrFail($value, ?string $column = null): Model;

    /**
     * Get filtered collection
     *
     * @param array $search
     * @return Collection
     */
    public function getAll(array $search = []): Collection;

    /**
     * Get filtered collection as cursor output
     *
     * @param array $search
     * @return LazyCollection
     */
    public function getAllCursor(array $search = []): LazyCollection;

    /**
     * Get paginated data
     *
     * @param array $search
     * @param int $pageSize
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(array $search = [], int $pageSize = 15): LengthAwarePaginator;

    /**
     * Find first model
     *
     * @param array $attributes
     * @return Model|null
     * @throws WrongSearchParametersException
     */
    public function findFirst(array $attributes): ?Model;

    /**
     * Find all models by params
     *
     * @param array $attributes
     * @return Collection
     * @throws WrongSearchParametersException
     */
    public function findMany(array $attributes): Collection;

    /**
     * Set with
     *
     * @param array $with
     * @return BaseRepositoryInterface
     */
    public function with(array $with): BaseRepositoryInterface;

    /**
     * Set with count
     *
     * @param array $withCount
     * @return BaseRepositoryInterface
     */
    public function withCount(array $withCount): BaseRepositoryInterface;
}