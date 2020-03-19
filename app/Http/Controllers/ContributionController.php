<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use App\Rules\Recaptcha;
use App\Infection;
use App\Contributor;
use App\InfectionHistory;

class ContributionController extends Controller
{
    public function createContribution()
    {
        return view('contribute');
    }
 
    public function storeContribution(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city' => 'required|string',
            'cases' => 'required|integer|min:0',
            'serious' => 'required|integer|min:0',
            'deaths' => 'required|integer|min:0',
            'recovered' => 'required|integer|min:0',
            'first_case' => 'required|date',
            'sources' => 'required|string',
            'email' => 'required|email',
            'infection_id' => 'required',
            'recaptcha_response' => ['required', new Recaptcha]
        ]);

        $contributor = Contributor::firstOrNew([
            'email' => $request->email,
        ]);

        if (empty($contributor->name)) {
            $contributor->name = $request->name;
        }

        $contributor->save();

        $infection = Infection::find(intval($request->infection_id));
        $new = "Não";

        $history = new InfectionHistory();

        if (empty($infection)) {
            $new = "Sim";
            $infection = new Infection();
            $infection->city_id = $request->city_id;
        } else {
            $history->city_id = intval($infection->city_id);
            $history->cases = intval($infection->cases);
            $history->serious = intval($infection->serious);
            $history->deaths = intval($infection->deaths);
            $history->recovered = intval($infection->recovered);
            $history->sources = strval($infection->sources);
            $history->first_case = new \DateTime($infection->first_case);
            $history->contributor_id = !is_null($infection->contributor_id) ? intval($infection->contributor_id) : null;
        }

        $infection->city_id;
        $infection->cases = intval($request->cases);
        $infection->serious = intval($request->serious);
        $infection->deaths = intval($request->deaths);
        $infection->recovered = intval($request->recovered);
        $infection->contributor_id = $contributor->id;

        $sources = strip_tags($request->sources);
        $sources = addslashes($sources);

        if (empty($infection->sources)) {
            $infection->sources .= filter_var($sources, FILTER_SANITIZE_STRING);
        } else {
            $infection->sources .= PHP_EOL . PHP_EOL . filter_var($sources, FILTER_SANITIZE_STRING);
        }

        if (empty($infection->first_case)) {
            $infection->first_case = $request->first_case;
        }

        try {
            $infection->save();

            $history->infection_id = $infection->id;
            $history->save();
        } catch (\Exception $e) {
            Log::error($e);
            return view('contribute', ['success' => false]);
        }

        $text = "Uma nova contribuição foi enviada!\n"
                . "<b>Nome do usuário: </b>$request->name\n"
                . "<b>Cidade para atualizar: </b>$request->city\n"
                . "<b>Casos: </b>$request->cases\n"
                . "<b>Graves: </b>$request->serious\n"
                . "<b>Mortes: </b>$request->deaths\n"
                . "<b>Recuperados: </b>$request->recovered\n"
                . "<b>Primeiro Caso: </b>$request->first_case\n"
                . "<b>Novo município afetado: </b>$new\n"
                . "<b>Fontes: </b>\n"
                . $request->sources;

        if (!\App::environment('local')) {
            \Telegram::sendMessage([
                'chat_id' => '-1001434079160',
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
        } else {
            Log::debug($text);
        }

        return view('contribute', ['success' => true]);
        
    }
}
