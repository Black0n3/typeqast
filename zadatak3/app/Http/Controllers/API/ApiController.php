<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Arr;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function characters(Request $request)
    {
        // Trenutna stranica
        $page = $request->page;
        // pozivanje apija
        $url = 'https://swapi.dev/api/people?page='.$page;
        $client = new Client;
        $request = $client->get($url);
        $response = $request->getBody()->getContents();
        $response = json_decode($response, true);
        // Prilagođavanje linkova našoj app
        $next_link = data_get($response, 'next', null);
        $previous_link = data_get($response, 'previous', null);
        // postavljanje novih linkova
        data_set($response, 'next', 'radili');


        return $response;
    }


}
