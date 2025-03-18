<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer toutes les propriétés et les envoyer à la vue
        $properties = Property::all();
        return view('dashboard', compact('properties'));
    }
}