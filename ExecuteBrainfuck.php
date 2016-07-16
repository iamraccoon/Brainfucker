<?php

//see https://ru.wikipedia.org/wiki/Brainfuck

$str = '';

$arr = str_split($str);
$res = array_fill(0, 30000, 0);

$i = 0;
for($j = 0; $j < count($arr); $j++) {
    switch ($arr[$j]) {
        case '+':
            $res[$i]++;
            break;
        case '-':
            $res[$i]--;
            break;
        case '>':
            $i++;
            break;
        case '<':
            $i--;
            break;
        case '.':
            echo chr($res[$i]);
            break;
        case ',':
            $res[$i] = ord(fgetc(STDIN));
            break;
        case '[':
            if(!$res[$i]) {
                $brackets = 1;
                while($brackets) {
                    $j++;
                    if($arr[$j] == '[') {
                        $brackets++;
                    } else if($arr[$j] == ']') {
                        $brackets--;
                    }
                }
            }
            break;
        case ']':
            if($res[$i]) {
                $brackets = 1;
                while($brackets) {
                    $j--;
                    if($arr[$j] == ']') {
                        $brackets++;
                    } else if($arr[$j] == '[') {
                        $brackets--;
                    }
                }
            }
            break;
    }
}
?>