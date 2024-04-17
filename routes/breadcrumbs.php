<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Bureau;
use App\Models\Enseignant;
use App\Models\EnseignantVacataire;
use App\Models\Materiel;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard ********************************************************
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route("dashboard"));
});


//Enseignants********************************************************

// Home > Enseignants
Breadcrumbs::for('enseignants', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Enseignants', route("enseignant.index"));
});

// Accueil > Enseignants  > [enseignant]
Breadcrumbs::for('enseignantshow', function (BreadcrumbTrail $trail, Enseignant $enseignant) {
    $trail->parent('enseignants');
    $trail->push($enseignant->nom, route("enseignant.show", $enseignant));
});

// Accueil > Enseignants  > [enseignant]
Breadcrumbs::for('enseignantedit', function (BreadcrumbTrail $trail, Enseignant $enseignant) {
    $trail->parent('enseignantshow', $enseignant);
    $trail->push("edit", route("enseignant.edit", $enseignant));
});



//Enseignant  Vacataire********************************************************

// Home > Ensegnants Vactaires
Breadcrumbs::for('vacataires', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Enseignants Vacataires', route("vacataire.index"));
});

// Accueil > Enseignants  > [enseignant]
Breadcrumbs::for('vacataireshow', function (BreadcrumbTrail $trail, EnseignantVacataire $vacataire) {
    $trail->parent('vacataires');
    $trail->push($vacataire->nom, route("vacataire.show", $vacataire));
});

// Accueil > Enseignants Vacataires  > [vacataire]
Breadcrumbs::for('vacataireedit', function (BreadcrumbTrail $trail, EnseignantVacataire $vacataire) {
    $trail->parent('vacataireshow', $vacataire);
    $trail->push('edit', route("vacataire.edit", $vacataire));
});


//Bureaux********************************************************

// Home >  Bureaux
Breadcrumbs::for('bureaux', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Locaux', route("bureau.index"));
});

// Accueil > Enseignants  > [bureaux]
Breadcrumbs::for('bureaushow', function (BreadcrumbTrail $trail, Bureau $bureau) {
    $trail->parent('bureaux');
    $trail->push($bureau->designation, route("bureau.show", $bureau));
});

// Accueil > Enseignants  > [bureaux] > edit
Breadcrumbs::for('bureauedit', function (BreadcrumbTrail $trail, Bureau $bureau) {
    $trail->parent('bureaushow', $bureau);
    $trail->push("edit", route("bureau.show", $bureau));
});


// Accueil > Enseignants  > [bureaux] > Ajout Enseignants
Breadcrumbs::for('bureauajoutenseignant', function (BreadcrumbTrail $trail, Bureau $bureau) {
    $trail->parent('bureaushow', $bureau);
    $trail->push("ajout enseignants", route("bureau.show", $bureau));
});


//Materiel ********************************************************

//1 --  Stocks

// Acceuil > Stocks
Breadcrumbs::for('stocks', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Stocks', route("materiel.equipement.index"));
});

//Acceuil > Stocks > Nouvelles acquisitions
Breadcrumbs::for('addstocks', function (BreadcrumbTrail $trail) {
    $trail->parent('stocks');
    $trail->push('Nouvelles acquisitions', route("materiel.equipement.create"));
});




// 2  Admin  Materiels

// Accueil > Materiels
Breadcrumbs::for('materiels', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('materiels', route("materiel.materiel.index"));
});




// Accueil > Materiels > [materiel]
Breadcrumbs::for('materielshow', function (BreadcrumbTrail $trail, Materiel $materiel) {
    $trail->parent('materiels');
    $trail->push($materiel->designation, route("materiel.materiel.show", $materiel));
});

Breadcrumbs::for('materieledit', function (BreadcrumbTrail $trail, Materiel $materiel) {
    $trail->parent('materielshow', $materiel);
    $trail->push("edit", route("materiel.materiel.edit", $materiel));
});


// affectation
Breadcrumbs::for('affectations', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('affectations', route("materiel.materiel.index"));
});
