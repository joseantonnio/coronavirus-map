<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/',
            'timeout' => 2.0
        ]);

        $response = $client->request('POST', 'siteverify', [
            'query' => [
            'secret' => env('RECAPTCHA_SECRET', ''),
            'response' => $value
            ]
        ]);

        $recaptcha = json_decode($response->getBody());

        return $recaptcha->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Você não passou na validação do reCAPTCHA Tente novamente.';
    }
}
