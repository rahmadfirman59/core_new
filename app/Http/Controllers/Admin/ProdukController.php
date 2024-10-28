<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukSaveRequest;
use App\Services\DocumentService;
use App\Services\ProdukService;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $produkService;

    public function __construct()
    {
        $this->produkService = new ProdukService();
        view()->share(['list_kategori' => $this->produkService->list_kategori()]);
    }

    public function index()
    {
        return view('admin.produk.index');
    }

    public function search(Request $request)
    {
        $produk = $this->produkService->search($request->all());

        return view('admin.produk._table',compact('produk'));
    }

    public function create()
    {
        return view('admin.produk._info');
    }

    public function store(ProdukSaveRequest $request)
    {
        $filename = DocumentService::save_file($request, 'file_gambar', 'produk');

        if ($filename !== '') $request->merge(['gambar' => $filename]);

        $this->produkService->store($request->all());
    }

    public function edit(Request $request, $id)
    {
        $produk = $this->produkService->find($id);

        return view('admin.produk._info', compact('produk',));
    }

    public function update(ProdukSaveRequest $request, $id)
    {
        $filename = DocumentService::save_file($request, 'file_gambar', 'produk');

        if ($filename !== '') $request->merge(['gambar' => $filename]);

        $this->produkService->update($request->all(),$id);
    }

    public function destroy($id)
    {
        return $this->produkService->delete($id);
    }

}
