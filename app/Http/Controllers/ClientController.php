<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function index()
    {
        return view('anothergit.home');
    }
    public function showlocation(Request $req)
    {
        // Http::get("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/24.850463, 46.678785/2022-01-01/2022-05-01?unitGroup=metric&elements=datetime%2Cicon&include=days&key=B8WZUP4ZTLXFHBRF3XW29DPDT&contentType=json");
        
        return view('anothergit.result');
    }

    public function result()
    {
        return view('result');
    }
}
