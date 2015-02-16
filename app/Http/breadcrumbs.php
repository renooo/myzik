<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Accueil', route('home'));
});

// Accueil > Groupes
Breadcrumbs::register('bands', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Groupes', route('bands.index'));
});

// Accueil > Groupes > [Groupe]
Breadcrumbs::register('band', function($breadcrumbs, $band)
{
    $breadcrumbs->parent('bands');
    $breadcrumbs->push($band->name, route('bands.show', $band->id));
});

// Accueil > Groupes > [Genre]
Breadcrumbs::register('bands.genre', function($breadcrumbs, $genre)
{
    $breadcrumbs->parent('bands');
    $breadcrumbs->push('Par genre : '.$genre->name, route('bands.index', ['genre' => $genre->id]));
});

// Accueil > Groupes > [Pays]
Breadcrumbs::register('bands.country', function($breadcrumbs, $country)
{
    $breadcrumbs->parent('bands');
    $breadcrumbs->push('Par pays : '.$country->name, route('bands.index', ['country' => $country->id]));
});
