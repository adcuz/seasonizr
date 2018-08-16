<?php

use Adcuz\Seasonizr\Conversion;
use PHPUnit\Framework\TestCase;
use Carbon\Carbon;

class ConversionTest extends TestCase
{
    public function testConvertsNorthernHemisphereCountryToSeason()
    {
        $conversion = new Conversion();
        $aSummerDay = Carbon::createFromDate(2018, 06, 23);
        $this->assertEquals('summer', $conversion->country('GB', $aSummerDay));

        $aSpringDay = Carbon::createFromDate(2018, 04, 01);
        $this->assertEquals('spring', $conversion->country('GB', $aSpringDay));

        $anAutumnDay = Carbon::createFromDate(2018, 10, 01);
        $this->assertEquals('autumn', $conversion->country('GB', $anAutumnDay));

        $aWinterDay = Carbon::createFromDate(2018, 01, 23);
        $this->assertEquals('winter', $conversion->country('GB', $aWinterDay));
    }

    public function testConvertsSouthernHemisphereCountryToSeason()
    {
        $conversion = new Conversion();
        $aSummerDay = Carbon::createFromDate(2018, 01, 01);
        $this->assertEquals('summer', $conversion->country('AU', $aSummerDay));

        $aSpringDay = Carbon::createFromDate(2018, 10, 01);
        $this->assertEquals('spring', $conversion->country('AU', $aSpringDay));

        $anAutumnDay = Carbon::createFromDate(2018, 04, 01);
        $this->assertEquals('autumn', $conversion->country('AU', $anAutumnDay));

        $aWinterDay = Carbon::createFromDate(2018, 07, 01);
        $this->assertEquals('winter', $conversion->country('AU', $aWinterDay));
    }
}