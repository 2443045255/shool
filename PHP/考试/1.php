<?php
function MaxNum($array)
{
    $sum = 0;
    for ($i = 0; $i <= count($array) - 1; $i++) {
        if ($array[$i] > $sum) {
            $sum = $array[$i];
        }
    }
    return $sum;
}

function SumNum($array)
{
    $sum = 0;
    for ($i = 0; $i <= count($array) - 1; $i++) {
        $sum += $array[$i];
    }
    return $sum;
}
echo SumNum([1, 3, 2]);
