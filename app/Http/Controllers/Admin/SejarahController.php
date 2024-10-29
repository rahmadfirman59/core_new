<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SejarahService;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    protected $sejarahService;

    public function __construct()
    {
        $this->sejarahService = new SejarahService();
    }

    public function index(Request $request)
    {
        return view('admin.sejarah.index');
    }

    public function search(Request $request)
    {
        $sejarah = $this->sejarahService->search($request->all());

        return view('admin.sejarah._table',compact('sejarah'));
    }

    public function edit($id)
    {
        $sejarah = $this->sejarahService->find($id);

        return view('admin.sejarah._info', compact('sejarah'));
    }

    public function update(Request $request,$id)
    {
        return $this->sejarahService->update($request->all(),1);
    }
}
