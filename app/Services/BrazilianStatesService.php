<?php

namespace Unidev\Services;

use GuzzleHttp\Client;

class BrazilianStatesService
{
    public function getAll()
    {
        $client = new Client([
            'base_uri' => 'https://servicodados.ibge.gov.br/api/v1/',
            'timeout' => 2.0
        ]);

        $response = $client->get('localidades/estados');

        return json_decode($response->getBody());
    }
}