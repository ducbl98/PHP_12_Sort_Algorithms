<?php
$arr = [];
for ($i = 0; $i < 50000; $i++) {
    array_push($arr, rand(1, 3000));
}

function getMedianOf3($a, $b, $c)
{
    $x = $a - $b;
    $y = $b - $c;
    $z = $a - $c;
    if ($x * $y >= 0) return $b;
    if ($x * $z >= 0) return $c;
    return $a;
}

function quickSort(&$arr, $leftIndex, $rightIndex)
{
    $index = partition($arr, $leftIndex, $rightIndex);
    if ($leftIndex < $index - 1)
        quickSort($arr, $leftIndex, $index - 1);
    if ($index < $rightIndex)
        quickSort($arr, $index, $rightIndex);
    return $arr;
}

function partition(&$arr, $leftIndex, $rightIndex)
{
    $pivot = getMedianOf3($arr[$leftIndex], $arr[$rightIndex], $arr[($leftIndex + $rightIndex) / 2]);

    while ($leftIndex <= $rightIndex) {
        while ($arr[$leftIndex] < $pivot)
            $leftIndex++;
        while ($arr[$rightIndex] > $pivot)
            $rightIndex--;
        if ($leftIndex <= $rightIndex) {
            $tmp = $arr[$leftIndex];
            $arr[$leftIndex] = $arr[$rightIndex];
            $arr[$rightIndex] = $tmp;
            $leftIndex++;
            $rightIndex--;
        }
    }
//    echo implode(",",$arr)." @pivot $pivot<br>";
    return $leftIndex;
}

$start = microtime(true);
echo implode(",", quickSort($arr, 0, count($arr) - 1));
$end = microtime(true);
echo "<br>" . ($end - $start);