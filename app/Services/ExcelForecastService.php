<?php

namespace App\Services;

use Exception;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class ExcelForecastService
{
    public function matchApprox(float $value, array $array): int
    {
        $index = 0;
        foreach ($array as $i => $v) {
            if ($v <= $value) {
                $index = $i;
            }
        }
        return $index;
    }

    public function offset(array $array, int $start, int $length): array
    {
        return array_slice($array, $start, $length);
    }

    public function forecastLinear(float $x, array $knownX, array $knownY)
    {
        $n = count($knownX);

        if ($n !== count($knownY) || $n < 2) {
            return ExcelError::NA();
            // throw new Exception("Invalid forecast data");
        }

        $sumX = array_sum($knownX);
        $sumY = array_sum($knownY);

        $sumXY = 0;
        $sumX2 = 0;

        for ($i = 0; $i < $n; $i++) {
            $sumXY += $knownX[$i] * $knownY[$i];
            $sumX2 += $knownX[$i] ** 2;
        }

        $b = ($n * $sumXY - $sumX * $sumY) /
            ($n * $sumX2 - $sumX ** 2);

        $a = ($sumY - $b * $sumX) / $n;

        return $a + $b * $x;
    }
}

// how to use
// $BC = [10,20,30,40,50];
// $BD = [100,200,300,400,500];
// $F6 = 35;

// $match = $forecast->matchApprox($F6, $BC);

// $knownX = $forecast->offset($BC, $match, 3);
// $knownY = $forecast->offset($BD, $match, 3);

// return $forecast->forecastLinear($F6, $knownX, $knownY);
