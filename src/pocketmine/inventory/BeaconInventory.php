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

namespace pocketmine\inventory;

use pocketmine\tile\Beacon;
use pocketmine\network\mcpe\protocol\types\WindowTypes;

class BeaconInventory extends ContainerInventory {

	/**
	 * BeaconInventory constructor.
	 *
	 * @param Beacon $tile
	 */
	public function __construct(Beacon $tile){
		parent::__construct($tile);
	}
	
	public function getName() : string{
		return "Beacon";
	}
	
	public function getDefaultSize() : int{
		return 1;
	}

	/**
	 * @return InventoryHolder
	 */
	public function getHolder(){
		return $this->holder;
	}
	
	public function getNetworkType() : int{
		return WindowTypes::BEACON;
	}
}