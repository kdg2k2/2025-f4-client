<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.document.index');
    }

    public function show(Request $request, $id)
    {
        return view('admin.document.view', ['id' => $id]);
    }
}
