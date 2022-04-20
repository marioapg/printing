<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Client;

class TrackingController extends Controller
{
    public function tracking(Request $request)
    {
        if ($request->tracking) {
            $url = 'http://devpyp.urbano.com.ec/ws/ue/tracking/'; //testing
            // $url = 'https://app.urbano.com.ec/ws/ue/tracking/'; //produccion

            $usuario = '3398-WS';
            $password ='7c222fb2927d828af22f592134e8932480637c0d';
            $params = [
                'guia' => $request->tracking,
                'docref' => '',
                'vp_linea' => 3
            ];

            $data = [
                'json' => json_encode($params)
            ];

            $response = Http::asForm()
                            ->withHeaders([
                                "Content-type" => "application/x-www-form-urlencoded",
                                "user" => $usuario,
                                "pass" => $password
                            ])->post($url, $data);

            dd($response->body());
        }
    }
}
