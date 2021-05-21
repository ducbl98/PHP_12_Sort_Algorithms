<?php
$arr = [];
for ($i = 0; $i < 30000; $i++) {
    array_push($arr, rand(1, 3000));
}

function bubbleSort(&$arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}

$start = microtime(true);
echo implode(",",bubbleSort($arr));
$end = microtime(true);
echo "<br>" . ($end - $start);