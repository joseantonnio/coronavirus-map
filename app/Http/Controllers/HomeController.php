<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Infection;

class HomeController extends Controller
{
    public function index()
    {
        $last_infection = Infection::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $infections = Infection::select(
            DB::raw('sum(cases) as total_cases, sum(deaths) as total_deaths, sum(serious) as total_serious, sum(recovered) as total_recovered')
        )->first();

        $response = [];

        if (!is_null($last_infection)) {
            $response['last_update'] = $last_infection->updated_at->format("d/m/Y H:m:s");
        }

        if ($infections->count() > 0) {
            $response['infections'] = $infections;
        }
        
        return view('welcome', $response);
    }
}
