<?php
/**
 * [repeat description]
 * @param  array  $array [ulazni niz]
 * @return array  $array [izlazni niz formatiran u json]
 */
function repeat(array $array){
    $repeat = 3;
    $array = array_merge(...array_fill(0, $repeat, $array));
    return json_encode($array);
}

$array = [1,2,3];
echo repeat($array);

?>
