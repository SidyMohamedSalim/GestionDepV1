<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\FournitureRequest;
use App\Models\Designation;
use App\Models\Materiel;
use App\Models\Reference;
use Illuminate\Http\Request;

class MaterielsController extends Controller
{
    //

    public function index()
    {
        return view('admin.Materiel.index');
    }






    public function update(Request $request, Materiel $materiel)
    {

        return view('admin.Materiel.form');
    }
}
