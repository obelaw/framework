<?php

namespace Obelaw\Framework\Eloquent\Trids;

trait CRUDRepository
{
    public function all($paginate = 10)
    {
        return $this->model->latest()->paginate($paginate);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        $model = $this->model->find($id);
        return $model->delete();
    }
}
