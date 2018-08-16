<?php

namespace Adcuz\Seasonizr;

class Season
{
    public const SPRING = 'spring';

    public const SUMMER = 'summer';

    public const AUTUMN = 'autumn';

    public const WINTER = 'winter';

    private const CONFIG = [
      Hemisphere::NORTH => [
        self::SPRING => [
          'start' => ['m' => 3, 'd' => 1],
          'end'   => ['m' => 05, 'd' => 31],
        ],
        self::SUMMER => [
          'start' => ['m' => 6, 'd' => 1],
          'end'   => ['m' => 8, 'd' => 31],
        ],
        self::AUTUMN => [
          'start' => ['m' => 9, 'd' => 1],
          'end'   => ['m' => 11, 'd' => 30],
        ],
        self::WINTER => [
          'start' => ['m' => 12, 'd' => 1],
          'end'   => ['m' => 2, 'd' => 28],
        ],
      ],
      Hemisphere::SOUTH => [
        self::SPRING => [
          'start' => ['m' => 9, 'd' => 1],
          'end'   => ['m' => 11, 'd' => 30],
        ],
        self::SUMMER => [
          'start' => ['m' => 12, 'd' => 1],
          'end'   => ['m' => 2, 'd' => 28],
        ],
        self::AUTUMN => [
          'start' => ['m' => 3, 'd' => 1],
          'end'   => ['m' => 5, 'd' => 31],
        ],
        self::WINTER => [
          'start' => ['m' => 6, 'd' => 1],
          'end'   => ['m' => 8, 'd' => 31],
        ],
      ],
    ];

    public static function get(\DateTime $date, $hemisphere)
    {
        if ($hemisphere === Hemisphere::NORTH) {
            return self::northern($date);
        }

        if ($hemisphere === Hemisphere::SOUTH) {
            return self::southern($date);
        }

        throw new \Exception('Invalid hemisphere set');
    }

    private static function northern(\DateTime $date)
    {
        $dateYear = $date->format("Y");

        $seasonConfig  = self::CONFIG[Hemisphere::NORTH][self::WINTER];
        $startOfWinter = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        $endOfWinter   = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['end']['m'],
          $seasonConfig['end']['d']
        );
        if ($date < $endOfWinter || $date >= $startOfWinter) {
            return self::WINTER;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::NORTH][self::AUTUMN];
        $startOfAutumn = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfAutumn) {
            return self::AUTUMN;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::NORTH][self::SUMMER];
        $startOfSummer = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfSummer) {
            return self::SUMMER;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::NORTH][self::SPRING];
        $startOfSpring = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfSpring) {
            return self::SPRING;
        }

        return null;
    }

    private static function southern(\DateTime $date)
    {
        // summer, spring, winter, fall
        $dateYear = $date->format("Y");

        $seasonConfig  = self::CONFIG[Hemisphere::SOUTH][self::SUMMER];
        $startOfSummer = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        $endOfSummer   = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['end']['m'],
          $seasonConfig['end']['d']
        );
        if ($date < $endOfSummer || $date >= $startOfSummer) {
            return self::SUMMER;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::SOUTH][self::SPRING];
        $startOfSpring = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfSpring) {
            return self::SPRING;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::SOUTH][self::WINTER];
        $startOfWinter = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfWinter) {
            return self::WINTER;
        }

        $seasonConfig  = self::CONFIG[Hemisphere::SOUTH][self::AUTUMN];
        $startOfAutumn = (new \DateTime())->setDate(
          $dateYear,
          $seasonConfig['start']['m'],
          $seasonConfig['start']['d']
        );
        if ($date >= $startOfAutumn) {
            return self::AUTUMN;
        }

        return null;
    }
}
