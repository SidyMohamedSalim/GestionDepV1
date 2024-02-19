<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaterielsController extends Controller
{
    //

    public function index()
    {
        return view('admin.Materiel.index');
    }

    public function edit()
    {
        return view('admin.Materiel.form');
    }

    public function create()
    {
        return view('admin.Materiel.form');
    }
}
