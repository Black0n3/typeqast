<?php
/**
 * [reformat function for reformat string]
 * @param  string $string [description]
 * @return string $new_string [description]
 */
function reformat(string $string){
    $new_string = ucfirst(strtolower($string));
    $new_string = str_replace("e", "", $new_string);
    return $new_string;
}

$string = "TyPEqaSt DeveLoper TeST";
echo reformat($string);

 ?>
