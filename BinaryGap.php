<?php
/**
***A binary gap within a positive integer N is any maximal sequence of consecutive zeros that is surrounded by ones at both ends in the binary representation of N
=> number 9 has binary representation 1001 and contains one binary gap of length 2
=> number 529 has binary representation 1000010001 and contains two binary gaps: one of length 4 and one of length 3. 
=> number 20  has binary representation 10100 and contains one binary gap of length 1
=> number 15 has binary representation 1111 and has no binary gaps.
=> number 32 has binary representation 100000 and has no binary gaps
***Write a function: that, given a positive integer N, returns the length of its longest binary gap. The function should return 0 if N doesn't contain a binary gap.
**/

/**
 * Check Interger for longest binary gap
 *
 * @param integer $n value that we want to check for binary gap
 * 
 * @throws Some_Exception_Class If something interesting cannot happen
 * @author Boant TP <https://github.com/boantp/>
 * @return Integer longest binary gap or 0
 */  
function solution($n) {
	$binary = decbin($n);
	//zero that surrounded by one at both ends, always start by 1 and end with one that binary gap
	$binary_in_arr = str_split($binary);

	if(! in_array(0, $binary_in_arr)) {
		return 0;
	}

	$gap 		= NULL;
	$last_key 	= 0;
	foreach ($binary_in_arr as $key => $value) {
		if($value == 1 && $key != 0) {
			$gap[] = ($key - $last_key) - 1;//5
			$last_key = $key;//5 - 0, 9 - 5
		}
	}

	if($gap == NULL) {
		return 0;
	} else {
		$gap_int = max($gap);
	}

	return $gap_int;
}

$n = 1041;
var_dump(solution($n)); 

?>
