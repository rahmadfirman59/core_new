<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriSaveRequest;
use App\Services\KategoriService;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $kategoriService;

    public function __construct()
    {
        $this->kategoriService = new KategoriService();
    }

    public function index(Request $request)
    {
        return view('admin.kategori.index');
    }

    public function search(Request $request)
    {
        $kategori = $this->kategoriService->search($request);

        return view('admin.kategori._table', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori._info');
    }

    public function store(KategoriSaveRequest $request)
    {
        $this->kategoriService->store($request->all());
    }

    public function edit($id)
    {
        $kategori = $this->kategoriService->find($id);

        return view('admin.kategori._info', compact('kategori'));
    }

    public function update(KategoriSaveRequest $request, $id)
    {
        $this->kategoriService->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->kategoriService->delete($id);
    }
}
