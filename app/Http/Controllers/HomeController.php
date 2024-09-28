<?php

namespace App\Http\Controllers;

use App\Models\Decant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch a random selection of featured decants (e.g., 4 products)
        $featuredDecants = Decant::inRandomOrder()->take(4)->get();

        return view('home', compact('featuredDecants'));
    }
}
