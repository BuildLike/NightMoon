<?php

/*
 *
 *
 *    _______                    _
 *   |__   __|                  (_)
 *      | |_   _ _ __ __ _ _ __  _  ___
 *      | | | | | '__/ _` | '_ \| |/ __|
 *      | | |_| | | | (_| | | | | | (__
 *      |_|\__,_|_|  \__,_|_| |_|_|\___|
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author TuranicTeam
 * @link https://github.com/TuranicTeam/Turanic
 *
 *
*/

namespace pocketmine\block;

use pocketmine\item\Tool;
use pocketmine\item\Item;

class RedNetherBrick extends Solid{

    protected $id = self::RED_NETHER_BRICK;

    public function __construct($meta = 0){
        $this->meta = $meta;
    }

    public function getToolType(){
        return Tool::TYPE_PICKAXE;
    }

    public function getHardness(){
        return 2;
    }

    public function getName(){
        return "Red Nether Bricks";
    }

    public function getDrops(Item $item): array{
        if($item->isPickaxe() >= 1){
            return [
                [Item::RED_NETHER_BRICK, 0, 1],
            ];
        }else{
            return [];
        }
    }
}