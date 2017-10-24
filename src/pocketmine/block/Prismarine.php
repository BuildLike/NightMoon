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

class Prismarine extends Solid {

	const NORMAL = 0;
	const DARK = 1;
	const BRICKS = 2;

	protected $id = self::PRISMARINE;

	/**
	 * Prismarine constructor.
	 *
	 * @param int $meta
	 */
	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	/**
	 * @return float
	 */
	public function getHardness(){
		return 1.5;
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		static $names = [
			self::NORMAL => "Prismarine",
			self::DARK => "Dark Prismarine",
			self::BRICKS => "Prismarine Bricks",
		];
		return $names[$this->meta & 0x03] ?? "Unknown";
	}

	/**
	 * @return int
	 */
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	/**
	 * @param Item $item
	 *
	 * @return array
	 */
	public function getDrops(Item $item) : array{
		if($item->isPickaxe() >= Tool::TIER_WOODEN){
			return [
				[$this->id, $this->meta & 0x03, 1],
			];
		}else{
			return [];
		}
	}

    public function canHarvestWithHand(): bool{
        return false;
    }
}