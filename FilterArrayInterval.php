<?php

function filterArrayInterval(array $arrayMultiDim){
    array_multisort($arrayMultiDim, SORT_ASC);
    $arrayFinal = [];
    $temp = [];
    foreach ($arrayMultiDim as $index => $tabInterval)
    {
        if ($index == 0) {
            $temp = $tabInterval;
        } else {
            if ($tabInterval[0] <= $temp[1]) {
                if ($tabInterval[1] > $temp[1]) {
                    $temp[1] = $tabInterval[1];
                }
            } else {
                array_push($arrayFinal, $temp);
                $temp = $tabInterval;
            }
        }
    }
    array_push($arrayFinal, $temp);

    return $arrayFinal;
}

function test()
{
    $array = [[7, 8], [3, 6], [2, 4]];
    $test = filterArrayInterval($array);
    print_r(json_encode($test));

    // résulat : [[2,6],[7,8]]

}
