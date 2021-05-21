<?php
$arr = [];
for ($i = 0; $i < 100000; $i++) {
    array_push($arr, rand(1, 3000));
}

function mergeSort(&$arr)
{
    if (count($arr) == 1) return $arr;
    $midIndex = count($arr) / 2;
    $arrLeft = array_slice($arr, 0, $midIndex);
    $cl=count($arrLeft);
//    echo "<br>" . implode(",", $arrLeft)."@length arrLeft $cl<br>";
    $arrRight = array_slice($arr, $midIndex);
    $cr=count($arrRight);
//    echo "<br>" . implode(",", $arrRight)."@length arrRight $cr<br>";
    $arrLeft = mergeSort($arrLeft);
    $arrRight = mergeSort($arrRight);
    return merge($arrLeft, $arrRight);
}

function merge($arrLeft, $arrRight)
{
    $resultMerge = [];
    $leftIndex = 0;
    $rightIndex = 0;
    while ($leftIndex < count($arrLeft) && $rightIndex < count($arrRight)) {
        if ($arrLeft[$leftIndex] < $arrRight[$rightIndex]) {
            array_push($resultMerge, $arrLeft[$leftIndex]);
            $leftIndex++;
        } else {
            array_push($resultMerge, $arrRight[$rightIndex]);
            $rightIndex++;
        }
    }
    while ($leftIndex < count($arrLeft)) {
        array_push($resultMerge, $arrLeft[$leftIndex]);
        $leftIndex++;
    }
    while ($rightIndex < count($arrRight)) {
        array_push($resultMerge, $arrRight[$rightIndex]);
        $rightIndex++;
    }
//    echo "<br>" . implode(",", $resultMerge);
    return $resultMerge;
}

$start = microtime(true);
echo implode(",", mergeSort($arr));
$end = microtime(true);
echo "<br>" . ($end - $start);