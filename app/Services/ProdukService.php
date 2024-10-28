<?php

namespace App\Services;

use App\Models\Produk;

class ProdukService extends Service
{

    public function search($params = [])
    {
        $produk = Produk::whereNotNull('id');

        $nama = $params['nama'] ?? '';
        if ($nama !== '') $produk = $produk->where('nama', 'like', "%$nama%");

        $produk = $this->searchFilter($params, $produk, []);
        return $this->searchResponse($params, $produk);
    }

    public function find($value, $column = 'id')
    {
        return Produk::where($column, $value)->first();
    }

    public function store($params)
    {
        return Produk::create($params);
    }

    public function update($params, $id)
    {
        $produk = Produk::find($id);
        if (!empty($produk)) $produk->update($params);
        return $produk;
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        if (!empty($produk)) {
            try {
                $produk->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $produk;
    }

    public function list_kategori()
    {
        return array_combine(Produk::KATEGORI,Produk::KATEGORI);
    }
}
