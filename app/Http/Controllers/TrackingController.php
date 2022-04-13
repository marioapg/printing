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

            // $usuario = 'general-shi2';
            // $password = '7c222fb2927d828af22f592134e89324c0d';
            $usuario = '3498-RSALAZAR';
            $password ='Coronita.23';
            $params = [
                'guia' => $request->tracking,
                'docref' => '',
                'vp_linea' => 3
            ];

            $data = [
                'json' => json_encode($params)
            ];

            $response = Http::asForm()->post($url, $data);
                            // ->withHeaders([
                            //     "Content-type" => "application/x-www-form-urlencoded",
                            //     "user" => $usuario,
                            //     "pass" => $password
                            // ])
                            // ->withBody([
                            //     'json' => json_encode($params)
                            // ], 'json')
                            // ->get($url);

            dd($response->body());

            // $headers = [
            //     'http' => [
            //         'method' => 'GET',
            //         'header' => "Content-type: application/x-www-form-urlencoded" . "\r\n".
            //                     "user: " . $usuario . "\r\n" .
            //                     "pass: " . $password . "\r\n"
            //     ]
            // ];


            // $client = new Client([
            //     // Base URI is used with relative requests
            //     'base_uri' => $url,
            //     // You can set any number of default request options.
            //     'timeout'  => 2.0,
            // ]);

            // $response = $client->request(
            //                 'GET',
            //                 '/',
            //                 [
            //                     'header' => $headers,
            //                     'json' => $data
            //                 ]

            //             );
            // dd($response->getBody());
        }
    }
}
