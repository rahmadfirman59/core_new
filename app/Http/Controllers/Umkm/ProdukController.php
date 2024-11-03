<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdukSaveRequest;
use App\Services\DocumentService;
use App\Services\KategoriService;
use App\Services\ProdukService;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $produkService;

    public function __construct()
    {
        $this->produkService = new ProdukService();
        $kategoriService = new KategoriService();
        view()->share([
            'list_kategori' => $kategoriService->dropdown()
        ]);
    }

    public function index()
    {
        return view('umkm.produk.index');
    }

    public function search(Request $request)
    {
        $umkm = auth()->user()->umkm;

        $request->merge(['umkm_id' => $umkm->id]);

        $produk = $this->produkService->search($request->all());

        return view('umkm.produk._table',compact('produk'));
    }

    public function create()
    {
        return view('admin.produk._info');
    }

    public function store(ProdukSaveRequest $request)
    {
        $filename = DocumentService::save_file($request, 'file_gambar', 'produk');

        if ($filename !== '') $request->merge(['gambar' => $filename]);

        $umkm = auth()->user()->umkm;

        $request->merge(['umkm_id' => $umkm->id]);

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
