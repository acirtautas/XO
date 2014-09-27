<?php

namespace XO\Player;

/**
 * This class ...
 */
class XKDCPlayer implements PlayerInterface
{
    /**
     * @inheritdoc
     */
    public function turn($table, $symbol = self::SYMBOL_X)
    {
        $symbol = strtolower($symbol);

        $map = file_get_contents(__DIR__.'/xkdc/'.$symbol.'.txt');
        $map = preg_replace('/(.+)\s(.+)\s(.+)\s/', '\1\2\3', $map);


        $brd= '';
        $ptr = '/';
        for($x=0;$x<3;$x++) {
            for($y=0;$y<3;$y++) {

                $s = strtolower($table[$x][$y]);

                $brd.=$s?:'.';

                $ptr.= $s?:'[\.X]';
            }

            //$brd.=PHP_EOL;
        }
        $ptr .= '/';

        preg_match($ptr, $map, $out);
        if (count($out)) {
            $pos = strpos($out[0], strtoupper($symbol));

            if ($pos !== false) {

            if ($pos<3) {
                $y = $pos;
                $x = 0;
            }elseif($pos<6) {
                $y = $pos-3;
                $x = 1;
            }else{
                 $y = $pos-6;
                 $x = 2;
            }



            //echo $brd,PHP_EOL,$out[0]." $pos = [ $x , $y ]  \n";


            return [$x, $y];

            }
        }


            $x = $y = 1;
            while ($table[$x][$y] !== null) {
                $x = rand(0, 2);
                $y = rand(0, 2);
            }

            return [$x, $y];

    }


}
