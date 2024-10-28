<?php

namespace App\Services;

use App\Models\Kegiatan;

class KegiatanService extends Service
{
    public function search($params = [])
    {
        $kegiatan = Kegiatan::whereNotNull('id');

        $kegiatan = $this->searchFilter($params, $kegiatan, []);

        return $this->searchResponse($params, $kegiatan);
    }

    public function find($value, $column = 'id')
    {
        return Kegiatan::where($column, $value)->first();
    }

    public function store($params)
    {
        return Kegiatan::create($params);
    }

    public function update($params, $id)
    {
        $kegiatan = Kegiatan::find($id);
        if (!empty($kegiatan)) $kegiatan->update($params);
        return $kegiatan;
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::find($id);
        if (!empty($kegiatan)) {
            try {
                $kegiatan->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $kegiatan;
    }
}
