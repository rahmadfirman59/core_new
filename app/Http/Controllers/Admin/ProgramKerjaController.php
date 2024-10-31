<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ProgramKerjaServie;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    protected $programKerjaService;

    public function __construct()
    {
        $this->programKerjaService = new ProgramKerjaServie();
    }

    public function index(){

        return view('admin.program_kerja.index');
    }

    public function search(Request $request)
    {
        $program = $this->programKerjaService->search($request->all());

        return view('admin.program_kerja._table',compact('program'));
    }

    public function edit($id)
    {
        $program = $this->programKerjaService->find($id);

        return view('admin.program_kerja._info', compact('program'));
    }

    public function update(Request $request,$id)
    {
        return $this->programKerjaService->update($request->all(),1);
    }

}
