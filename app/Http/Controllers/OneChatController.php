<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class OneChatController extends Controller
{
    public function sendMessage()
    {

        $data = [
            'headers' => [
                'Authorization' => "Bearer A83c82ffd632854faa8d6df99fa883a851f798d62d307436eb773ac2eab3701b65462c40a3951460aa6707f63a1191d4d",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'to' => 'Uef604efa83ec5ebb8b545f9c789e0d2b',
                'bot_id' => 'B58ce98dc312152d5b46601edba090b2e',
                'type' => 'text',
                'message' => 'OTP: 33333'
            ]
        ];

        try {
            $client = new Client([
                'base_uri' => 'https://chat-public.one.th:8034/api/v1/',
                'verify' => false,
            ]);

            $res = $client->request('POST', 'push_message', $data);

        } catch (ConnectException $e) {
            return $e->getMessage();
        }

        return json_decode($res->getBody()->getContents());
    }
}
