<?php

namespace App\Services;

use App\Models\Sejarah;

class SejarahService extends Service
{

    public function search($params = [])
    {
        $sejarah = Sejarah::whereNotNull('id');

        $sejarah = $this->searchFilter($params, $sejarah, []);

        return $this->searchResponse($params, $sejarah);
    }

    public function find($value, $column = 'id')
    {
        return Sejarah::where($column, $value)->first();
    }

    public function update($params, $id)
    {
        $sejarah = Sejarah::find($id);

        if (!empty($sejarah)) $sejarah->update($params);

        return $sejarah;
    }
}
