<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Infection;
use App\State;

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

        $states = DB::table('states')
            ->select(DB::raw('
                states.name, 
                states.uf, 
                sum(infections.cases) as total_cases,
                sum(infections.serious) as total_serious,
                sum(infections.recovered) as total_recovered,
                sum(infections.deaths) as total_deaths
            '))
            ->leftJoin('cities', 'states.id', '=', 'cities.state_id')
            ->leftJoin('infections', 'cities.id', '=', 'infections.city_id')
            ->groupBy(['states.name', 'states.uf'])
            ->get();

        $states_select = State::select('id', 'name')->orderBy('name', 'ASC')->get();

        return view('data', ['infections' => $query, 'states' => $states, 'states_select' => $states_select]);
    }
}
