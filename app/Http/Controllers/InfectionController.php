<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Infection;

class InfectionController extends Controller
{
    public function index(Request $request)
    {
        $query = Infection::with(array('city' => function ($subquery) {
            $subquery->with('state')->select('id', 'name', 'lat', 'lng', 'radius', 'state_id');
        }))->select("id", "city_id", "cases", "deaths", "recovered", "serious", "first_case")->get();
        
        if ($request->ajax()) {
            return response()->json($query);
        }

        $infections = $query->map(function ($infection) {
            return [
                $infection->city->name . ', ' . $infection->city->state->uf,
                $infection->cases,
                $infection->serious,
                $infection->recovered,
                $infection->deaths,
                $infection->first_case->translatedFormat('d \d\e F \d\e Y'),
            ];
        });

        return view('data', ['data' => $infections]);
    }
}
