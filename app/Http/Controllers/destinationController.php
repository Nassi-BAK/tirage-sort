<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
class destinationController extends Controller
{
    

    public function showDestinations()
    {
        $destinations = Destination::all(); // ou selon ta logique de récupération des données
        return view('welcome', compact('destinations'));
    }
    
}
