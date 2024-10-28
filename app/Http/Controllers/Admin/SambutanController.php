<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SambutanService;
use Illuminate\Http\Request;

class SambutanController extends Controller
{
    protected $sambutanService;

    public function __construct()
    {
        $this->sambutanService = new SambutanService();
    }

    public function index(Request $request)
    {
        return view('admin.sambutan.index');
    }

    public function search(Request $request)
    {
        $sambutan = $this->sambutanService->search($request->all());

        return view('admin.sambutan._table',compact('sambutan'));
    }

    public function edit($id)
    {
        $sambutan = $this->sambutanService->find($id);

        return view('admin.sambutan._info', compact('sambutan'));
    }

    public function update(Request $request,$id)
    {
        return $this->sambutanService->update($request->all(),1);
    }
}
