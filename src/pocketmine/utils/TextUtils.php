<?php

/*
 *
 *
 *    __    _         _         __   __
 *   |  \  | |_      | |    _  |  \_/  |
 *   |   \ | (_) ___ | |__ | |_|       | ___   ___  ____
 *   | |\ \| | |/ _ \|  _ \| __| |\_/| |/ _ \ / _ \|  _ \
 *   | | \   | | (_| | / \ | |_| |   | | (_) | (_) | | | |
 *   |_|  \__|_|\__  |_| |_|\__|_|   |_|\___/ \___/|_| |_|
 *               __| |
 *              |___/
 *
 *
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author NightMoonTeam
 * @link https://github.com/NightMoonTeam/NightMoon
 *
 *
*/

namespace pocketmine\utils;

class TextUtils{

    public static function center(string $input){
        $clear = TextFormat::clean($input);
        $lines = explode("\n", $clear);
        $max = max(array_map("strlen", $lines));
        $lines = explode("\n", $input);
        foreach($lines as $key => $line){
            $lines[$key] = str_pad($line, $max + self::renkSayisi($line), " ", STR_PAD_LEFT);
        }
        return implode("\n", $lines);
    }

    public static function renkSayisi($yazi){
        $renkler = "abcdef0123456789lo";
        $sayi = 0;
        for($i=0; $i<strlen($renkler); $i++){
            $sayi += substr_count($yazi, "§".$renkler{$i});
        }
        return $sayi;
    }
}
