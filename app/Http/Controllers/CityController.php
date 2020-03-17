<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function index(Request $request)
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

    public function show($id)
    {
        $query = City::with(array("infections" => function ($subquery) {
            $subquery->select("id", "city_id", "cases", "deaths", "recovered", "serious", "first_case");
        }, "state" => function ($subquery) {
            $subquery->select("id", "uf");
        }))->select('id', 'name', "state_id")->findOrFail($id);
        

        return response()->json($query);
    }
}
