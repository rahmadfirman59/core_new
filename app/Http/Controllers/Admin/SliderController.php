<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderSaveRequest;
use App\Services\DocumentService;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $sliderServices;

    public function __construct()
    {
        $this->sliderServices = new SliderService();
    }

    public function index(Request $request)
    {
        return view('admin.slider.index');
    }

    public function search(Request $request)
    {
        $slider = $this->sliderServices->search($request->all());
        return view('admin.slider._table',compact('slider'));
    }

    public function create()
    {
        return view('admin.slider._info');
    }

    public function store(SliderSaveRequest $request)
    {
        $filename = DocumentService::save_file($request, 'file_gambar', 'slider');

        if ($filename !== '') $request->merge(['gambar' => $filename]);

        $this->sliderServices->store($request->all());
    }

    public function edit(Request $request, $id)
    {
        $slider = $this->sliderServices->find($id);

        return view('admin.slider._info', compact('slider',));
    }

    public function update(SliderSaveRequest $request, $id)
    {
        $filename = DocumentService::save_file($request, 'file_gambar', 'slider');

        if ($filename !== '') $request->merge(['gambar' => $filename]);

        $this->sliderServices->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->sliderServices->delete($id);
    }
}
