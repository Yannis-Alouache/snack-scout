<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(): View
    {
        $snacksExotiques = [
            [
                'id' => 1,
                'nom' => 'Chips de banane plantain',
                'origine' => 'Amérique Latine',
                'prix' => 3.99
            ],
            [
                'id' => 2,
                'nom' => 'Wasabi Peas',
                'origine' => 'Japon',
                'prix' => 2.49
            ],
            [
                'id' => 3,
                'nom' => 'Mochi glacé',
                'origine' => 'Japon',
                'prix' => 5.99
            ],
            [
                'id' => 4,
                'nom' => 'Biltong',
                'origine' => 'Afrique du Sud',
                'prix' => 6.99
            ],
            [
                'id' => 5,
                'nom' => 'Durian séché',
                'origine' => 'Thaïlande',
                'prix' => 4.99
            ],
            [
                'id' => 6,
                'nom' => 'Jerky de kangourou',
                'origine' => 'Australie',
                'prix' => 7.99
            ],
            [
                'id' => 7,
                'nom' => 'Taro Chips',
                'origine' => 'Hawaï',
                'prix' => 3.49
            ],
            [
                'id' => 8,
                'nom' => 'Pocky Matcha',
                'origine' => 'Japon',
                'prix' => 1.99
            ],
            [
                'id' => 9,
                'nom' => 'Sélection de fruits secs exotiques',
                'origine' => 'Divers',
                'prix' => 8.99
            ],
            [
                'id' => 10,
                'nom' => 'Chips de manioc',
                'origine' => 'Brésil',
                'prix' => 3.99
            ]
        ];
        
        return view('products', [
            'products' => $snacksExotiques
        ]);
    }

    public function details($id): View {
        return view('product-details');
    }
}