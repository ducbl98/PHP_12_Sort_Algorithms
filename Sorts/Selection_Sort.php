<?php
$arr = [];
for ($i = 0; $i < 30000; $i++) {
    array_push($arr, rand(1, 3000));
}

function selectionSort(&$arr)
{
    for ($i = 0; $i < count($arr) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        $temp = $arr[$min];
        $arr[$min] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

$start = microtime(true);
echo implode(",", selectionSort($arr));
$end = microtime(true);
echo "<br>" . ($end - $start);