<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function view($id){
        // pozivanje apija
        $url = 'https://swapi.dev/api/films/'.$id;
        $client = new Client;
        $request = $client->get($url);
        $response = $request->getBody()->getContents();
        $film = json_decode($response, true);

        return view('sites.films.show',compact('film'));
    }
}
