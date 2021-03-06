<?php

namespace XO\Player;

/**
 * This interface provides basic structure for game player
 */
interface PlayerInterface
{
    /**
     * Possible symbols to use
     */
    const SYMBOL_X = 'X';
    const SYMBOL_O = 'O';

    /**
     * @param array $table Array of current game state in 3x3 matrix
     * @param string $symbol Symbol to use to do return
     * @return array coordinates of new turn, fox example [0,1]
     */
    public function turn($table, $symbol = self::SYMBOL_X);
}
