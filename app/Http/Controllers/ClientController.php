<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    public function index()
    {
        return view('map');
    }

    public function result(Request $req)
    {
        $req->validate([
            'lat' => 'required',
            'lng' => 'required',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);
        try {


            $from = $req->from;
            $to = $req->to;
            $location = $req->lat . ',' . $req->lng;
            $response = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/' . $location . '/' . $from . '/' . $to . '?unitGroup=metric&elements=datetime%2Cicon&include=days&key=B8WZUP4ZTLXFHBRF3XW29DPDT&contentType=json');
            $data = $response->json();

            $resolvedAddress = $data['resolvedAddress'];
            $timezone = $data['timezone'];
            $days = $data['days'];
            $icons = array();
            $datetime = array();
            foreach ($days as $day) {
                if ($day['icon'] == 'rain') {
                    array_push($icons, $day['icon']);
                    array_push($datetime, $day['datetime']);
                }
            }
            return view('result', compact('resolvedAddress', 'icons', 'timezone', 'datetime'));
        }catch (\Exception $e){
            return back()->withErrors(['msg'=>'there was an error from the api']);
    }
    }
}
