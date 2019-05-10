<?php
function prrimeListArr($prime_counter = 0)
{
   $prime_arr = array();
   $digit = 2;
   
   while (1) {
        if(is_int(sqrt($digit))) {
            continue;
        } else {
            $is_prime = true;
            for($divisor = 2; $divisor <= 9; $divisor ++) {
                if(($digit % $divisor == 0) && ($digit != $divisor)) {
                    $is_prime = false;
                    break;
                }
            }
            if($is_prime) {
                $prime_arr[] = $digit;
            }
        }

        if(count($prime_arr) == $prime_counter) {
            break;
        }
        $digit ++;
   }

   return $prime_arr;
}



function prepareTable($prime_arr = array())
{
    $prime_counter = count($prime_arr);
    echo "<br>\r\n";
    echo str_pad(" ", 10);
    for($row = 0; $row < $prime_counter; $row ++) {
        for($col = 0; $col < $prime_counter; $col ++) {
            if($row == 0) {
                $multiplier = 1;
            } else if($col == 0) {
                $multiplier = $prime_arr[$row - 1];
                echo str_pad($multiplier, 10);
            }

            echo str_pad(($prime_arr[$col] * $multiplier), 10);
            if(($col + 1) == $prime_counter) { 
                echo "<br>\r\n"; 
            }
        }
    }
}


$counter = 0;
if(defined('STDIN')) {
    $counter = isset($argv[2]) ? $argv[2] : 0;
} else {
    $counter = isset($_GET['count']) ? $_GET['count'] : 0;
}

if($counter > 0) {
    $prime_list = prrimeListArr($counter);
    prepareTable($prime_list);
} else {
    echo "Please enter value > 0\r\n";
}
