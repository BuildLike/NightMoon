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

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\Player;

class IronDoor extends Door {

	protected $id = self::IRON_DOOR_BLOCK;

	/**
	 * IronDoor constructor.
	 *
	 * @param int $meta
	 */
	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		return "Iron Door Block";
	}

	/**
	 * @return int
	 */
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	/**
	 * @return int
	 */
	public function getHardness(){
		return 5;
	}

	/**
	 * @param Item $item
	 *
	 * @return array
	 */
	public function getDrops(Item $item) : array{
		if($item->isPickaxe() >= 1){
			return [
				[Item::IRON_DOOR, 0, 1],
			];
		}else{
			return [];
		}
	}

    /**
	 * @param Item        $item
	 * @param Player|null $player
	 *
	 * @return bool
	 */
	public function onActivate(Item $item, Player $player = null){
		if($player instanceof Player) return true;
		else return parent::onActivate($item, $player);
	}

    /**
     * @return bool
     */
    public function canHarvestWithHand(): bool{
        return false;
    }
}