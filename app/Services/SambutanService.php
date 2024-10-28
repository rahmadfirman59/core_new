<?php

namespace App\Services;

use App\Models\Sambutan;

class SambutanService extends Service
{
    public function search($params = [])
    {
        $sambutan = Sambutan::whereNotNull('id');


        $sambutan = $this->searchFilter($params, $sambutan, []);
        return $this->searchResponse($params, $sambutan);
    }

    public function find($value, $column = 'id')
    {
        return Sambutan::where($column, $value)->first();
    }

    public function update($params, $id)
    {
        $asmbutan = Sambutan::find($id);
        if (!empty($asmbutan)) $asmbutan->update($params);
        return $asmbutan;
    }
}
