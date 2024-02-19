<?php

namespace App\Http\Controllers\Materiels;

use App\Http\Controllers\Controller;
use App\Http\Requests\Materiels\FournitureRequest;
use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielsController extends Controller
{
    //

    public function index()
    {
        return view('admin.Materiel.index');
    }

    public function create()
    {
        return view(
            'admin.Materiel.form',
            [
                'materiel' => new Materiel()
            ]
        );
    }


    public function store(Request $request)
    {
        dd(new FournitureRequest());
    }


    public function edit(Materiel $materiel)
    {



        return view('admin.Materiel.form', [
            'materiel' => $materiel
        ]);
    }


    public function update(Request $request, Materiel $materiel)
    {

        return view('admin.Materiel.form');
    }
}
