<?php

namespace App\Services;

use App\Models\Cities;

class DomainServices
{
    public function getDomain()
    {
        return request()->getHttpHost();
    }
    public function getData($domain)
    {
        $city = Cities::where('domain', $domain);
        $cityId = $city->value('id');
        $cityDesc = $city->value('desc');
        $cityKeyWords = $city->value('keywords');

        return [
            'cityId' => $cityId, 'cityDesc' => $cityDesc, 'cityKeyWords' => $cityKeyWords,
        ];
    }
}
