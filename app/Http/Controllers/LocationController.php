<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function store(Request $req)
    {
        Location::create([
            'lng' => $req->lng,
            'lat' => $req->lat,
        ]);
        return to_route('/');

    }

    public function index(Request $req)
    {
        $location = $req->lat.','.$req->lng;
        $response = Http::get('https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/'.$location.'/2022-01-01/2022-05-01?unitGroup=metric&elements=datetime%2Cicon&include=days&key=B8WZUP4ZTLXFHBRF3XW29DPDT&contentType=json');
        $data= $response->json();

        $queryCost = $data['queryCost'];
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $resolvedAddress = $data['resolvedAddress'];
        $address = $data['address'];
        $timezone = $data['timezone'];
        $tzoffset = $data['tzoffset'];
        $days = $data['days'];

        return view('anothergit.result', compact('address', 'resolvedAddress','days','latitude','queryCost','longitude','timezone','tzoffset'));
    }
}
