<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use App\Models\Materiel;
use Illuminate\Http\Request;

class ArchivesController extends Controller
{
    //


    public function index()
    {
        //TODO
    }

    public function allAffectations()
    {
        return view('admin.archives.affectation.index');
    }
}
