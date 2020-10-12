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
    public function character_search(Request $request)
    {
        // traženi pojam
        $search = $request->search;
        $data = [
            'count' => 0,
            'results' => []
        ];
        // pozivanje apija
        $url = 'https://swapi.dev/api/people/?search='.$search;
        $client = new Client;
        $request = $client->get($url);
        $response = $request->getBody()->getContents();
        $response = json_decode($response, true);
        
        foreach($response['results'] as $character){
            // kreiranje novog linka prilagođenom mojoj app
            $old_url = $character['url'];
            $old_url_array  = explode('/',$old_url);
            $old_url_id = $old_url_array[5];
            $new_url = route('web.character.view', ['id' => $old_url_id]);
            $new_url_films = route('web.character.films', ['id' => $old_url_id]);

            $data['results'][] = [
                'name' => $character['name'],
                'gender' => $character['gender'],
                'films' => count($character['films']),
                'url' => $new_url,
                'url_films' => $new_url_films
            ];
            
        }
        return $data;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function starship_search(Request $request)
    {
        // traženi pojam
        $search = $request->search;
        $data = [
            'count' => 0,
            'results' => []
        ];
        // pozivanje apija
        $url = 'https://swapi.dev/api/starships/?search='.$search;
        $client = new Client;
        $request = $client->get($url);
        $response = $request->getBody()->getContents();
        $response = json_decode($response, true);
        
        foreach($response['results'] as $character){
          

            $data['results'][] = [
                'name' => $character['name'],
                'model' => $character['model'],
                'crew' => $character['crew'],
                'passengers' => $character['passengers'],
            ];
            
        }
        return $data;
    }
    
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
