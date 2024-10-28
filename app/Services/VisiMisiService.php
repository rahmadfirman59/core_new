<?php

namespace App\Services;

use App\Models\VisiMisi;

class VisiMisiService extends Service
{
    public function search($params = [])
    {
        $visimisi = VisiMisi::whereNotNull('id');

        $visimisi = $this->searchFilter($params, $visimisi, []);

        return $this->searchResponse($params, $visimisi);
    }

    public function find($value, $column = 'id')
    {
        return VisiMisi::where($column, $value)->first();
    }

    public function update($params, $id)
    {
        $visimisi = VisiMisi::find($id);

        if (!empty($visimisi)) $visimisi->update($params);

        return $visimisi;
    }

}
