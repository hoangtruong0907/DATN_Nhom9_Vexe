<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Lấy tất cả bản ghi.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Lấy một bản ghi theo ID.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Tạo một bản ghi mới.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Cập nhật một bản ghi theo ID.
     *
     * @param int $id
     * @param array $attributes
     * @return bool
     */
    public function update($id, array $attributes)
    {
        $model = $this->find($id);

        if ($model) {
            return $model->update($attributes);
        }

        return false;
    }

    /**
     * Xóa một bản ghi theo ID.
     *
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        $model = $this->find($id);

        if ($model) {
            return $model->delete();
        }

        return false;
    }
}
