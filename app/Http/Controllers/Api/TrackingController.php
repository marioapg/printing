<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Client;

class TrackingController extends Controller
{
    public function tracking(Request $request)
    {
        if ($request->tracking) {
            // $url = 'http://devpyp.urbano.com.ec/ws/ue/tracking/get_datos_seguimiento'; //testing
            $url = 'https://app.urbano.com.ec/ws/ue/tracking/'; //produccion

            // $usuario = '3398-WS';
            // $password ='7c222fb2927d828af22f592134e8932480637c0d';
            $usuario = '3498-DINADEC';
            $password ='01b307acba4f54f55aafc33bb06bbbf6ca803e9a';
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

            echo "<pre>";
                var_dump( (array) $response->body() );
            echo "</pre>";
            die();
        }
    }
}
