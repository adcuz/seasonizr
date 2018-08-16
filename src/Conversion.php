<?php

namespace Adcuz\Seasonizr;


class Conversion
{
    public function country($countryCode, $date = null)
    {
        $continentCode = Continent::get($countryCode);
        $hemisphere = Hemisphere::get($continentCode);
        $onDate = $date ?: new \DateTime();
        return Season::get($onDate, $hemisphere);
    }
}
