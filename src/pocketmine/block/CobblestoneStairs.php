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

class CobblestoneStairs extends Stair {

	protected $id = self::COBBLESTONE_STAIRS;

	/**
	 * CobblestoneStairs constructor.
	 *
	 * @param int $meta
	 */
	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	/**
	 * @return int
	 */
	public function getHardness(){
		return 2;
	}

	/**
	 * @return int
	 */
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		return "Cobblestone Stairs";
	}

    public function canHarvestWithHand(): bool{
        return false;
    }
}