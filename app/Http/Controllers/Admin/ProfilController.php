<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProfilService;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    protected  $profilService;
    public function __construct()
    {
        $this->profilService = new ProfilService();
    }

    public function sambutan()
    {
        $sambutan = $this->profilService->find("sambutan",'tipe');

        return view('admin.profil.sambutan',compact('sambutan'));
    }

    public function save_sambutan(Request $request,$id)
    {
        return  $this->profilService->update($request->all(),$id);
    }
}
