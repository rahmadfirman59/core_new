<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanSaveRequest;
use App\Services\KegiatanService;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    protected $kegiatanServic;

    public function __construct()
    {
        $this->kegiatanServic = new KegiatanService();
    }

    public function index()
    {
        return view('admin.kegiatan.index');
    }

    public function search(Request $request)
    {
        $kegiatan = $this->kegiatanServic->search($request->all());

        return view('admin.kegiatan._table',compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan._info');
    }

    public function store(KegiatanSaveRequest $request)
    {
        $this->kegiatanServic->store($request->all());
    }

    public function edit($id)
    {
        $kegiatan = $this->kegiatanServic->find($id);

        return view('admin.kegiatan._info', compact('kegiatan',));
    }

    public function update(KegiatanSaveRequest $request, $id)
    {
        $this->kegiatanServic->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->kegiatanServic->delete($id);
    }

}
