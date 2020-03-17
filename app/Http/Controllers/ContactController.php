<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Recaptcha;

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
            'infection_id' => 'required',
            'recaptcha_response' => ['required', new Recaptcha]
        ]);
 
        $text = "Uma nova correção foi enviada!\n"
            . "<b>Nome do usuário: </b>$request->name\n"
            . "<b>Cidade para atualizar: </b>$request->city\n"
            . "<b>Casos: </b>$request->cases\n"
            . "<b>Graves: </b>$request->serious\n"
            . "<b>Mortes: </b>$request->deaths\n"
            . "<b>Recuperados: </b>$request->recovered\n"
            . "<b>Primeiro Caso: </b>$request->first_case\n"
            . "<b>InfectionID: </b>$request->infection_id\n"
            . "<b>Fontes: </b>\n"
            . $request->sources;
 
        \Telegram::sendMessage([
            'chat_id' => '-1001434079160',
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
 
        return redirect()
        ->back()
        ->with(
            'success',
            'Obrigado pela contribuição! Os dados foram enviados com sucesso e serão avaliados o mais rápido possível.'
        );
    }
}
