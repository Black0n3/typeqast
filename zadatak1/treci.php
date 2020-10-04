<?php
/**
 * [next_binary_number description]
 * @param  array  $array 
 * @return array  $prazan_niz
 */
function next_binary_number(array $array){
    $niz1 = array_reverse($array); // Okreni niz naopačke pošto se binarni sustav računa od desna prema lijevo
    $niz2 = array_merge([1], array_fill(1, count($niz1)-1,0)); // Stvaranje niza za računanje plus broj 1
    $prazan_niz = []; // naš novi slijedeći binarni broj

    foreach($niz1 as $key => $item){
        // računanje binarnog sustava 0+0 = 0; 1+0 ili 0+1 = 1; 1+1 = 10
        if($item==0 && $niz2[$key]==0){
            $prazan_niz[] = 0;
    	}elseif($item==1 && $niz2[$key]==0 or $item==0 && $niz2[$key]==1){
    		$prazan_niz[] = 1;
    	}elseif($item==1 && $niz2[$key]==1){
            $prazan_niz[] = 0;
    		$niz2[$key+1] = 1;
    	}

        // provjera zadnjeg elementa u nizu
        if(!next($niz1) ) {
            // provjera imaju li svi elementi u nizu2 broj 1 ako imaju dodaj praznom nizu dodatan broj 1
            if (count(array_unique($niz2)) === 1 && end($niz2) === 1) {
               $prazan_niz[] = 1;
            }
        }

    }
    // vrati jsonu rezultat i okreni ga nazad
    return json_encode(array_reverse($prazan_niz));
}

$array = [1,1,0,1];
echo next_binary_number($array);

?>
