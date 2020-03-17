<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\Infection;

class HomeController extends Controller
{
    public function index()
    {
        $last_infection = Infection::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $infections = Infection::select(
            DB::raw('sum(cases) as total_cases, sum(deaths) as total_deaths, sum(serious) as total_serious, sum(recovered) as total_recovered')
        )->first();

        $response = Array();

        if (!is_null($last_infection)) {
            $response['last_update'] = $last_infection->updated_at->format("d/m/Y H:m:s");
        }

        if ($infections->count() > 0) {
            $response['infections'] = $infections;
        }
        
        return view('welcome', $response);
    }

    public function cities(Request $request)
    {
        $search = $request->input('q');
        $query = City::with(array('state' => function ($subquery) {
            $subquery->select('id', 'uf');
        }))->select("id", "name", "lat", "lng", "state_id")->where("name", "like", '%' . $search . '%')->limit(200)->get();

        $result = $query->map(function ($city) {
            $data['id'] = $city->id;
            $data['value'] = $city->lat . ',' . $city->lng;
            $data['label'] = $city->name . ', ' . $city->state->uf;
            return $data;
        });

        return response()->json($result);
    }
}
