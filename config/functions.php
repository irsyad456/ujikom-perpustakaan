<?php

namespace app\config;

use yii\helpers\VarDumper;

class functions
{
    /**
     * Debug function
     * d($var);
     */
    function d($var, $caller = null)
    {
        if (!isset($caller)) {
            $caller = array_shift(debug_backtrace(1));
        }
        echo '<code>File: ' . $caller['file'] . ' / Line: ' . $caller['line'] . '</code>';
        echo '<pre>';
        VarDumper::dump($var, 10, true);
        echo '</pre>';
    }

    /**
     * Debug function with die() after
     * dd($var);
     */
    public function dd($var)
    {
        $caller = array_shift(debug_backtrace(1));
        self::d($var, $caller);
        die();
    }

    /**
     * Dump the data using pre
     * and stop remaining code with die()
     * 
     */
    public static function DumpAndDie($mixed)
    {
        echo '<pre>';
        print_r($mixed);
        echo '</pre>';
        die;
    }

    /**
     * Generate Random String
     */
    public static function generateRandomString($int)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $int; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
