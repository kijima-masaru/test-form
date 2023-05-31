<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddressByPostcode($postcode)
{
    $url = 'https://api.zipaddress.net/?zipcode=' . urlencode($postcode);

    // APIへのリクエストを送信
    $response = file_get_contents($url);

    // レスポンスのJSONをデコード
    $data = json_decode($response, true);

    // 住所を取得
    $address = '';
    if ($data && isset($data['data']['fullAddress'])) {
        $address = $data['data']['fullAddress'];
    }

    return $address;
}
}
