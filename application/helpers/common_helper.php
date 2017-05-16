<?php
function add_trailing_zero($num){
    for($c = strlen($num);$c<5;$c++){
        $num = "0".$num;
    }
    return $num;
}