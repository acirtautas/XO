<?php


$symbol = 'x';

$table = [
    ['x','o',null],
    [null,null,null],
    [null,null,null],
];


$map = file_get_contents(__DIR__.'/xkdc/'.$symbol.'.txt');
$map = preg_replace('/(.+)\s(.+)\s(.+)\s/', '\1\2\3', $map);

$ptr = '/';
for($x=0;$x<3;$x++) {
    for($y=0;$y<3;$y++) {
        $ptr.= $table[$x][$y]?:'[\.X]';
    }
}
$ptr .= '/';

echo $ptr, PHP_EOL;

preg_match($ptr, $map, $out);

if (count($out)) {
    //echo $out[0];

    $pos = strpos($out[0], strtoupper($symbol));


    $x = $pos % 3;
    $y = floor($pos / 3);

    echo $out[0],' = ',$pos, " [$x,$y]",PHP_EOL;
}


//$ptr = implode($table[0]).implode($table[1]).implode($table[2]);

//print_r($map);
