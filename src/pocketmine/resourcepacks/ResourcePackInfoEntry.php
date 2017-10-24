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

namespace pocketmine\resourcepacks;

class ResourcePackInfoEntry {
	protected $packId; //UUID
	protected $version;
	protected $packSize;

	/**
	 * ResourcePackInfoEntry constructor.
	 *
	 * @param string $packId
	 * @param string $version
	 * @param int    $packSize
	 */
	public function __construct(string $packId, string $version, $packSize = 0){
		$this->packId = $packId;
		$this->version = $version;
		$this->packSize = $packSize;
	}

	/**
	 * @return string
	 */
	public function getPackId() : string{
		return $this->packId;
	}

	/**
	 * @return string
	 */
	public function getVersion() : string{
		return $this->version;
	}

	/**
	 * @return int
	 */
	public function getPackSize(){
		return $this->packSize;
	}

}