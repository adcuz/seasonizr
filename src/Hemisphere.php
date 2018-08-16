<?php

namespace Adcuz\Seasonizr;

class Hemisphere
{
    public const NORTH = 'NORTH';

    public const SOUTH = 'SOUTH';

    public const CONTINENT_HEMISPHERE = [
      "AS" => self::NORTH,
      "AN" => self::SOUTH,
      "AF" => self::SOUTH,
      "SA" => self::SOUTH,
      "EU" => self::NORTH,
      "OC" => self::SOUTH,
      "NA" => self::NORTH
    ];

    /**
     * @param $continentCode string
     *
     * @return string A hemisphere name
     * @throws \Exception
     *
     * Returns the corresponding hemisphere for a given country code.
     *
     * | Code | Name |
     * |----|---------------|
     * | AS | Asia          |
     * | AN | Antarctica    |
     * | AF | Africa        |
     * | SA | South America |
     * | EU | Europe        |
     * | OC | Oceania       |
     * | NA | North America |
     *
     */
    public static function get($continentCode)
    {
        if (empty(static::CONTINENT_HEMISPHERE[$continentCode])) {
            throw new \Exception('Continent not found.');
        }
        return static::CONTINENT_HEMISPHERE[$continentCode];
    }
}
