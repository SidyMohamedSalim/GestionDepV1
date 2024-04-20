<?php

namespace App\Http\Controllers;

use App\Models\Demande;
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

    public function allDemandes()
    {


        return view('admin.archives.demande.index');
    }
    public function addDemande()
    {
        return view('admin.archives.demande.form');
    }
}
