<?php

namespace App\Services;

use App\Models\Cities;

class DomainServices
{
    public function getDomain()
    {
        return request()->getHttpHost();
    }
    public function getData($id)
    {
        $city = Cities::where('id', $id);
        $cityId = $city->value('id');
        $cityDesc = $city->value('desc');
        $cityKeyWords = $city->value('keywords');

        return [
            'cityId' => $cityId, 'cityDesc' => $cityDesc, 'cityKeyWords' => $cityKeyWords,
        ];
    }
}
