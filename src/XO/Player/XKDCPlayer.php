<?php

namespace XO\Player;

/**
 * This class ...
 */
class XKDCPlayer implements PlayerInterface
{
    private $map = [
        'X' => [
            "........." => [0,0],
            "xo......." => [1,1],
            "x.o......" => [2,0],
            "x..o....." => [1,1],
            "x...o...." => [2,2],
            "x....o..." => [1,1],
            "x.....o.." => [0,2],
            "x......o." => [1,1],
            "x.......o" => [0,2],
            "xoo.x...." => [2,2],
            "xo.ox...." => [2,2],
            "xo..x.o.." => [2,2],
            "xo..x..o." => [2,2],
            "xo..x...o" => [2,0],
            "xoo...x.." => [1,0],
            "x.oo..x.." => [2,2],
            "x.o.o.x.." => [1,0],
            "x.o..ox.." => [1,0],
            "x.o...xo." => [1,0],
            "x.o...x.o" => [1,0],
            "x.oox...." => [2,2],
            "x..oxo..." => [2,2],
            "x..ox.o.." => [2,2],
            "x..ox..o." => [2,2],
            "x..ox...o" => [0,2],
            "xo..o...x" => [2,1],
            "x.o.o...x" => [2,0],
            "x..oo...x" => [1,2],
            "x...oo..x" => [1,0],
            "x...o.o.x" => [0,2],
            "x...o..ox" => [0,1],
            "xo..xo..." => [2,2],
            "x.o.xo..." => [2,2],
            "x...xoo.." => [2,2],
            "x...xo.o." => [2,2],
            "x...xo..o" => [0,2],
            "xox...o.." => [2,2],
            "x.xo..o.." => [0,1],
            "x.x.o.o.." => [0,1],
            "x.x..oo.." => [0,1],
            "x.x...oo." => [0,1],
            "x.x...o.o" => [0,1],
            "x.o.x..o." => [2,2],
            "x...x.oo." => [2,2],
            "x...x..oo" => [2,0],
            "xox.....o" => [2,0],
            "x.xo....o" => [0,1],
            "x.x.o...o" => [0,1],
            "x.x..o..o" => [0,1],
            "x.x....oo" => [0,1],
            "xoo.x.x.o" => [1,0],
            "xo.ox.x.o" => [0,2],
            "xo..xox.o" => [1,0],
            "xo..x.xoo" => [1,0],
            "xooo..x.x" => [2,1],
            "x.ooo.x.x" => [2,1],
            "x.oo.ox.x" => [2,1],
            "xooo..xox" => [1,1],
            "xoxox...o" => [2,0],
            "x.xoxo..o" => [0,1],
            "x.xox.o.o" => [0,1],
            "x.xox..oo" => [0,1],
            "xoo.o..xx" => [2,0],
            "xo.oo..xx" => [2,0],
            "xo..oo.xx" => [2,0],
            "xo..o.oxx" => [0,2],
            "xoo.o.x.x" => [1,0],
            "x.o.oox.x" => [2,1],
            "x.o.o.xox" => [1,0],
            "xo.oox..x" => [0,2],
            "x.ooox..x" => [2,0],
            "x..ooxo.x" => [0,2],
            "x..oox.ox" => [0,2],
            "xo.xoo..x" => [2,0],
            "x.oxoo..x" => [2,0],
            "x..xooo.x" => [0,2],
            "x..xoo.ox" => [2,0],
            "xox.o.o.x" => [1,2],
            "x.xoo.o.x" => [0,1],
            "x.x.ooo.x" => [0,1],
            "x.x.o.oox" => [1,2],
            "xxo.o..ox" => [2,0],
            "xx.oo..ox" => [0,2],
            "xx..oo.ox" => [0,2],
            "xx..o.oox" => [0,2],
            "xox.xo..o" => [2,0],
            "x.x.xoo.o" => [0,1],
            "x.x.xo.oo" => [0,1],
            "xoxo..o.x" => [1,2],
            "xox..oo.x" => [1,1],
            "xox...oox" => [1,2],
            "x.o.x.xoo" => [1,0],
            "x..ox.xoo" => [0,2],
            "x...xoxoo" => [1,0],
            "xoxo..x.o" => [1,1],
            "xox.o.x.o" => [1,0],
            "xox..ox.o" => [1,0],
            "xox...xoo" => [1,0],
            "xoxoo.oxx" => [1,2],
            "xox.oooxx" => [1,0],
            "xooooxx.x" => [2,1],
            "x.oooxxox" => [0,1],
            "xoxxooo.x" => [2,1],
            "x.xxoooox" => [0,1],
            "xxooo.xox" => [1,2],
            "xxo.ooxox" => [1,0],
        ],
        'O' => [

        ]
    ];

    /**
     * @inheritdoc
     */
    public function turn($table, $symbol = self::SYMBOL_X)
    {
        $brd= '';
        for($x=0;$x<3;$x++) {
            for($y=0;$y<3;$y++) {
                $brd .= strtolower($table[$x][$y])?:'.';
            }
        }

        if (isset($this->map[$symbol][$brd])) {
            return $this->map[$symbol][$brd];
        }


        $x = $y = 0;
        while ($table[$x][$y] !== null) {
            $x = rand(0, 2);
            $y = rand(0, 2);
        }

        return [$x, $y];
    }

}
