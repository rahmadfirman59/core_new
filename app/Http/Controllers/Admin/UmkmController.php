<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UmkmSaveRequest;
use App\Services\UmkmService;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    protected $umkmService;

    public function __construct()
    {
        $this->umkmService = new UmkmService();
        view()->share(['jenis_usaha' => $this->umkmService->jenis_usaha()]);
    }

    public function index()
    {
        return view('admin.umkm.index');
    }

    public function search(Request $request)
    {
        $umkm = $this->umkmService->search($request->all());

        return view('admin.umkm._table',compact('umkm'));
    }

    public function create()
    {
        return view('admin.umkm._info');
    }

    public function store(UmkmSaveRequest $request)
    {
        $this->umkmService->store($request->all());
    }

    public function edit($id)
    {
        $umkm = $this->umkmService->find($id);

        return view('admin.umkm._info', compact('umkm',));
    }

    public function update(UmkmSaveRequest $request, $id)
    {
        $this->umkmService->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->umkmService->delete($id);
    }
}
