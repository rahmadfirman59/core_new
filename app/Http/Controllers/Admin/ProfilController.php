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

    public function visi_misi()
    {
        $visi = $this->profilService->find("visi-misi",'tipe');

        return view('admin.profil.visi_misi',compact('visi'));
    }

    public function save_visi(Request $request,$id)
    {
        return  $this->profilService->update($request->all(),$id);
    }

    public function sejarah()
    {
        $sejarah = $this->profilService->find("sejarah",'tipe');

        return view('admin.profil.sejarah',compact('sejarah'));
    }

    public function save_sejarah(Request $request,$id)
    {
        return  $this->profilService->update($request->all(),$id);
    }

    public function pengurus()
    {
        $pengurus = $this->profilService->find("pengurus",'tipe');

        return view('admin.profil.pengurus',compact('pengurus'));
    }

    public function save_pengurus(Request $request,$id)
    {
        return  $this->profilService->update($request->all(),$id);
    }

    public function program_kerja()
    {
        $program = $this->profilService->find("program-kerja",'tipe');

        return view('admin.profil.program_kerja',compact('program'));
    }

    public function save_program_kerja(Request $request,$id)
    {
        return  $this->profilService->update($request->all(),$id);
    }
}
