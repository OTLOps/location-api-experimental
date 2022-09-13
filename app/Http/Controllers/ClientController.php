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
        // try {


            $from = $req->from;
            $to = $req->to;
            $location = $req->lat . ',' . $req->lng;
            $response = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/' . $location . '/' . $from . '/' . $to . '?unitGroup=metric&elements=datetime%2Cprecip%2Cicon&include=days&key=5RX2TSU5UJJQLV2B4LDBM8PV4&contentType=json');
            $data = $response->json();
			// dd($data);
            $resolvedAddress = $data['resolvedAddress'];
            $timezone = $data['timezone'];
            $days = $data['days'];
            $icons = array();
            $datetime = array();
            $precip = array();
            foreach ($days as $day) {
                if ($day['icon'] == 'rain') {
                    array_push($icons, $day['icon']);
                    array_push($datetime, $day['datetime']);
                    $day['precip'] *= 10;
                    array_push($precip, $day['precip']);
                }
            }
            return view('result', compact('resolvedAddress', 'icons', 'timezone', 'datetime','precip'));
        // } catch (\Exception $e) {
        //     return back()->withErrors(['msg' => 'there was an error from the api']);
        // }
    }
}
