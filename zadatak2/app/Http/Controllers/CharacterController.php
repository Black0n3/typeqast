<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index(){
        return view('sites.characters.index');
    }
    
    public function view(){
        return view('sites.characters.view');
    }
    
    public function films($id){
        $films = [];
        // pozivanje apija
        $url = 'https://swapi.dev/api/people/'.$id;
        $client = new Client;
        $request = $client->get($url);
        $response = $request->getBody()->getContents();
        $response = json_decode($response, true);
        // pozivanje apija za svaki film kako bi povukli sve potrebne informacije
        foreach($response['films'] as $film){
            $film_url = $film;
            $film_client = new Client;
            $film_request = $film_client->get($film_url);
            $film_response = $film_request->getBody()->getContents();
            $film_response = json_decode($film_response, true);
            
            // mjenjanje urla za film
            $old_url = $film_response['url'];
            $old_url_array  = explode('/',$old_url);
            $old_url_id = $old_url_array[5];
            $new_url_film = route('web.films.view', ['id' => $old_url_id]);
            
            // dodaj podatke u niz
            $films[] = [
                'title' => $film_response['title'],
                'director' => $film_response['director'],
                'release_date' => $film_response['release_date'],
                'film_url' => $new_url_film
            ];
        }
        $name = $response['name'];
        

        return view('sites.characters.films', compact('films','name'));
    }
    
    
}
