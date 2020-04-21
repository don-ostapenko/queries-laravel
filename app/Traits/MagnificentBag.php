<?php

namespace App\Traits;

trait MagnificentBag
{

    /**
     * @param  int  $amountPupils
     * @param  int  $percent
     *
     * @return array
     */
    public function getAmountSportPupils(
        int $amountPupils = 28,
        int $percent = 75
    ): array {
        $sportPupils = $amountPupils * $percent / 100;
        return [$amountPupils, (int)$sportPupils, $percent];
    }

    /**
     * @param  string  $str
     *
     * @return array
     */
    public function getDigitsFromString(
        $str = 'This server has 386 GB RAM and 500GB storage'
    ): array {
        preg_match_all("/\d+/", $str, $matches);
        return [$matches[0], $str];
    }

    /**
     * @return array
     */
    public function changeVariables(): array
    {
        $a = [1, 2, 3, 4, 5];
        $b = 'Hello world';

        array_push($a, $b);
        $b = $a;
        $a = array_pop($b);

        return [$a, $b];
    }

}
