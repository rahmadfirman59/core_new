<?php

namespace App\Services;

use App\Models\Slider;

class SliderService extends Service
{
    public function search($params = [])
    {
        $slider = Slider::whereNotNull('id');

        $judul = $params['judul'] ?? '';
        if ($judul !== '') $slider = $slider->where('judul', 'like', "%$judul%");

        $slider = $this->searchFilter($params, $slider, []);

        return $this->searchResponse($params, $slider);
    }

    public function find($value, $column = 'id')
    {
        return Slider::where($column, $value)->first();
    }

    public function store($params)
    {
        return Slider::create($params);
    }

    public function update($params, $id)
    {
        $slider = Slider::find($id);
        if (!empty($slider)) $slider->update($params);
        return $slider;
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!empty($slider)) {
            try {
                $slider->delete();
            } catch (\Exception $e) { return ['error' => 'Delete user failed! This user currently being used']; }
        }
        return $slider;
    }

}
