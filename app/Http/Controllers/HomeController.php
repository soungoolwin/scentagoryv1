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


        foreach ($featuredDecants as $d) {
            $prices = $d->prices;

            if ($prices->isEmpty()) {
                $d->priceRange = null;
                continue;
            }

            $min = $prices->min('price');
            $max = $prices->max('price');

            // always two decimals: 10.00
            $fmtMin = number_format($min, 2);
            $fmtMax = number_format($max, 2);

            $d->priceRange = $min == $max
                ? "{$fmtMin} MMK"                       // e.g. 15.00 MMK
                : "{$fmtMin} – {$fmtMax} MMK";          // e.g. 10.00 – 30.00 MMK
        }

        return view('home', compact('featuredDecants'));
    }
}
