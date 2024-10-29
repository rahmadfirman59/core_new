<?php

namespace App\Services;

use App\Models\Pengurus;

class PengurusService extends Service
{

    public function search($params = [])
    {
        $pengurus = Pengurus::whereNotNull('id');

        $pengurus = $this->searchFilter($params, $pengurus, []);

        return $this->searchResponse($params, $pengurus);
    }

    public function find($value, $column = 'id')
    {
        return Pengurus::where($column, $value)->first();
    }

    public function store($params)
    {
        return Pengurus::create($params);
    }

    public function update($params, $id)
    {
        $pengurusu = Pengurus::find($id);

        if (!empty($pengurusu)) $pengurusu->update($params);

        return $pengurusu;
    }

    public function delete($id)
    {
        $pengurus = Pengurus::find($id);
        if (!empty($pengurus)) {
            try {
                $pengurus->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $pengurus;
    }

}
