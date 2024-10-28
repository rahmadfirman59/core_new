<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\VisiMisiService;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    protected $visimisiService;
    public function __construct()
    {
        $this->visimisiService = new VisiMisiService();
    }

    public function index(Request $request)
    {
        return view('admin.visimisi.index');
    }

    public function search(Request $request)
    {
        $visimisi = $this->visimisiService->search($request->all());

        return view('admin.visimisi._table',compact('visimisi'));
    }

    public function edit($id)
    {
        $visimisi = $this->visimisiService->find($id);

        return view('admin.visimisi._info', compact('visimisi'));
    }

    public function update(Request $request,$id)
    {
        return $this->visimisiService->update($request->all(),1);
    }
}
