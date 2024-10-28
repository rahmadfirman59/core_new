<?php

namespace App\Services;

use App\Models\Profil;

class ProfilService extends Service
{
    public function search($params = [])
    {
        $profil = Profile::whereNotNull('id');

        $slider = $this->searchFilter($params, $profil, []);

        return $this->searchResponse($params, $slider);
    }

    public function find($value, $column = 'id')
    {
        return Profil::where($column, $value)->first();
    }

    public function store($params)
    {
        return Profil::create($params);
    }

    public function update($params, $id)
    {
        $profil = Profil::find($id);
        if (!empty($profil)) $profil->update($params);
        return $profil;
    }

    public function delete($id)
    {
        $profil = Profil::find($id);
        if (!empty($profil)) {
            try {
                $profil->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $profil;
    }

}
