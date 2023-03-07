<?php

namespace App\Services;

use GuzzleHttp\Client;

class RestCountriesService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCountries($params = [])
    {
        $response = $this->client->request('GET', 'https://restcountries.com/v3.1/subregion/south%20america', ['verify' => false],[
            'query' => $params,
        ]);

        return json_decode($response->getBody(), true);
    }
}
