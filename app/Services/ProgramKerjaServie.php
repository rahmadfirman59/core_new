<?php

namespace App\Services;

use App\Models\ProgramKerja;

class ProgramKerjaServie extends  Service
{
    public function search($params = [])
    {
        $program = ProgramKerja::whereNotNull('id');

        $program = $this->searchFilter($params, $program, []);

        return $this->searchResponse($params, $program);
    }

    public function find($value, $column = 'id')
    {
        return ProgramKerja::where($column, $value)->first();
    }

    public function update($params, $id)
    {
        $program = ProgramKerja::find($id);

        if (!empty($program)) $program->update($params);

        return $program;
    }
}
