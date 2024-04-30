<?php


return [
    // route de dashboard
    [
        "url" => "/",
        "name" => "index",
        'controller' => \Controllers\Index::class,
        'method' => 'index',
    ],
    
    // route des tables de données
    
    //  tableau du flux
    [
        "url" => "/table_flux",
        "name" => "mouvement",
        'controller' => \Controllers\Flux::class,
        'method' => 'table',
    ],
     //  tableau des propriété
     [
        "url" => "/locale",
        "name" => "propriete",
        'controller' => \Controllers\Propriete::class,
        'method' => 'locale',
    ],
     //  tableau des locataire
     [
        "url" => "/table_locataire",
        "name" => "locataire",
        'controller' => \Controllers\Locataire::class,
        'method' => 'table',
    ],
    //  tableau de contrat
    [
        "url" => "/table_contrat",
        "name" => "contrat",
        'controller' => \Controllers\Contrat::class,
        'method' => 'table',
    ],
     // tableau de paiement
     [
        "url" => "/table_paiement",
        "name" => "paiement",
        'controller' => \Controllers\Paiement::class,
        'method' => 'table',
    ],
    
    // route des formulaire d'insertion
   
    // route de formulaire du flux
    [
        "url" => "/formulaire_flux",
        "name" => "mouvement",
        'controller' => \Controllers\Flux::class,
        'method' => 'formulaire',
    ],
    // route de formulaire des propriété
    [
        "url" => "/enregistrement",
        "name" => "propriete",
        'controller' => \Controllers\Propriete::class,
        'method' => 'enregistrement',
    ],
    // route de formulaire de locataire
    [
        "url" => "/formulaire_locataire",
        "name" => "locataire",
        'controller' => \Controllers\Locataire::class,
        'method' => 'formulaire',
    ],
    // route de formulaire de contart 
    [
        "url" => "/formulaire_contrat",
        "name" => "contrat",
        'controller' => \Controllers\Contrat::class,
        'method' => 'formulaire',
    ],
    // route du formulaire de paiement
    [
        "url" => "/formulaire_paiement",
        "name" => "paiement",
        'controller' => \Controllers\Paiement::class,
        'method' => 'formulaire',
    ],
    // route des vue des contrat
    [
        "url" => "/voire",
        "name" => "contrat",
        'controller' => \Controllers\Contrat::class,
        'method' => 'vue',
    ],
    [
        "url" => "/performance",
        "name" => "perfomance",
        'controller' => \Controllers\performance::class,
        'method' => 'performeces',
    ],
    [
        "url" => "/tresorerie",
        "name" => "tresorerie",
        'controller' => \Controllers\Tresorerie::class,
        'method' => 'tresoreries',
    ],
    [
        "url" => "/Recette",
        "name" => "Recette",
        'controller' => \Controllers\Recette::class,
        'method' => 'Recettes',
    ],
    // pages de d'authentification(connection  et inscription)
    [
        "url" => "/login",
        "name" => "Authent",
        'controller' => \Controllers\Authent::class,
        'method' => 'connection',
    ],
    
   
    
];