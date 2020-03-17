<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Rules\Recaptcha;
use App\Infection;
use App\Contributor;

class ContactController extends Controller
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

        if (empty($infection)) {
            $new = "Sim";
            $infection = new Infection();
            $infection->city_id = $request->city_id;
        }

        $infection->cases = intval($request->cases);
        $infection->serious = intval($request->serious);
        $infection->deaths = intval($request->deaths);
        $infection->recovered = intval($request->recovered);

        $sources = strip_tags($request->sources);
        $sources = addslashes($sources);
        $infection->sources .= filter_var($sources, FILTER_SANITIZE_STRING);
        
        if (empty($infection->first_case)) {
            $infection->first_case = $request->first_case;
        }

        $infection->save();
        $infection->contributors()->attach($contributor);

        $text = "Uma nova correção foi enviada!\n"
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
 
        return redirect()
        ->back()
        ->with(
            'success',
            'Obrigado pela contribuição! Os dados foram enviados com sucesso e serão avaliados o mais rápido possível.'
        );
    }
}
