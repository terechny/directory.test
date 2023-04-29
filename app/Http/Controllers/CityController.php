<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Cookie;

use App\Services\CityService;

class CityController extends Controller
{

    public function index($city=null){

        if($city){

            Cookie::queue(Cookie::make('city', $city, 100));
                      
        }else{

            if (Cookie::get('city')) {
          
                return redirect()->route('city', ['city' => Cookie::get('city')]);
            } 
        }

        return view('home', [ 'cities' => City::all(), 'selected' => $city ]);
    }

}
