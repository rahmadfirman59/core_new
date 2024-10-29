<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PengurusService;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    protected  $pengurusService;

    public function __construct()
    {
        $this->pengurusService = new PengurusService();
    }

    public function index(Request $request)
    {
        return view('admin.pengurus.index');
    }

    public function search(Request $request)
    {
        $pengurus = $this->pengurusService->search($request->all());

        return view('admin.pengurus._table',compact('pengurus'));
    }

    public function create()
    {
        return view('admin.pengurus._info');
    }

    public function store(Request $request)
    {
        $this->pengurusService->store($request->all());
    }

    public function edit($id)
    {
        $pengurus = $this->pengurusService->find($id);

        return view('admin.pengurus._info', compact('pengurus'));
    }

    public function update(Request $request,$id)
    {
        return $this->pengurusService->update($request->all(),1);
    }
}
