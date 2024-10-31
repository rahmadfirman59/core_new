<?php

namespace App\Services;

use App\Models\Umkm;

class UmkmService extends Service
{

    public function search($params = [])
    {
        $umkm = Umkm::whereNotNull('id');

        $nama = $params['nama'] ?? '';
        if ($nama !== '') $umkm = $umkm->where('nama', 'like', "%$nama%");

        $umkm = $this->searchFilter($params, $umkm, ["jenis_usaha"]);

        return $this->searchResponse($params, $umkm);
    }

    public function find($value, $column = 'id')
    {
        return Umkm::where($column, $value)->first();
    }

    public function store($params)
    {
        return Umkm::create($params);
    }

    public function update($params, $id)
    {
        $umkm = Umkm::find($id);

        if (!empty($umkm)) $umkm->update($params);

        return $umkm;
    }

    public function delete($id)
    {
        $umkm = Umkm::find($id);
        if (!empty($umkm)) {
            try {
                $umkm->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $umkm;
    }

    public function jenis_usaha()
    {
        return array_combine(Umkm::KATEGORI, Umkm::KATEGORI);
    }

}
