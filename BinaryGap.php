<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug messagen";

$N = 1041;
function solution($N) {
    // write your code in PHP7.0
    //convert into binary number
  $n_bin = decbin($N);
  //echo $n_bin."<br />";
    //$parse_n = explode("0", $n_bin);
  $parse_n = str_split($n_bin);
    //var_dump($parse_n);
  $hold_one = 1;
  $hold_zero = 1;
  $before_n = null;
  $array_hold_zero = [];
  foreach($parse_n as $k => $v) {
    if($v == "1") {         
      if($before_n == "1"){
       $hold_one = $hold_one + 1;
       if(sizeof($parse_n) - 1 == $k)
       {
         $array_hold_one[] = $hold_one;
         if(sizeof($array_hold_one) == 1) {
                                                                              //unset($array_hold_zero);
          $array_hold_one = array();
        }
      }
    }
    if($before_n == "0"){
     $array_hold_zero[] = $hold_zero;
     if(sizeof($parse_n) - 1 != $k){
      $hold_zero = 1;
    }
  }

} elseif($v == "0") {
  if($before_n == "0"){
   $hold_zero = $hold_zero + 1;
   if(sizeof($parse_n) - 1 == $k)
   {
     $array_hold_zero[] = $hold_zero;
     if(sizeof($array_hold_zero) == 1) {
                                                                              //unset($array_hold_zero);
      $array_hold_zero = array();
    }
  }
}
if($before_n == "1"){
 $array_hold_one[] = $hold_one;
 if(sizeof($parse_n) - 1 != $k){
  $hold_one = 1;
}
}
}
$before_n = $v;
}
arsort($array_hold_zero);
arsort($array_hold_one);
$array_hold_zero = array_values($array_hold_zero);
$array_hold_one = array_values($array_hold_one);
$zero = isset($array_hold_zero[0]) ? (int)$array_hold_zero[0] : null;
$one = isset($array_hold_one[0]) ? (int)$array_hold_one[0] : null;
if($zero > $one){
  if($zero == 1 || $zero == null) {
    return 0;
  } else {
    return $zero;
  }

} else 
{
  if($one == 1 || $one == null) {
    return 0;
  } else {
    return $one;
  }
}

  //var_dump($array_hold_zero, $array_hold_one);
}

echo solution($N);
?>
