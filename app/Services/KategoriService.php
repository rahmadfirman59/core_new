<?php

namespace App\Services;

use App\Models\Kategori;

class KategoriService extends Service
{
    public function search($params = [])
    {
        $kategori = Kategori::whereNotNull('id');


        $nama = $params['nama'] ?? '';
        if ($nama !== '') $kategori = $kategori->where('nama_kategori', 'like', "%$nama%");

        $kategori = $this->searchFilter($params, $kategori, []);
        return $this->searchResponse($params, $kategori);
    }

    public function find($value, $column = 'id')
    {
        return Kategori::where($column, $value)->first();
    }

    public function store($params)
    {
        return Kategori::create($params);
    }

    public function update($params, $id)
    {
        $kategori = Kategori::find($id);
        if (!empty($kategori)) $kategori->update($params);
        return $kategori;
    }

    public function delete($id)
    {
        $kategori = Kategori::find($id);
        if (!empty($kategori)) {
            try {
                $kategori->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $kategori;
    }

    public function dropdown()
    {
        $result = [];
        foreach ($this->search() as $value) {
            $result[$value->id] =$value->nama_kategori;
        }
        return $result;
    }
}
