<?php
$arr = [];
for ($i = 0; $i < 30000; $i++) {
    array_push($arr, rand(1, 3000));
}

function insertionSort(&$arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        $value = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $value) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $value;
    }
    return $arr;
}

$start = microtime(true);
echo implode(",", insertionSort($arr));
$end = microtime(true);
echo "<br>" . ($end - $start);