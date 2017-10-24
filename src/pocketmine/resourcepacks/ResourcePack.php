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


interface ResourcePack {

	/**
	 * @return string
	 */
	public function getPackName() : string;

	/**
	 * @return string
	 */
	public function getPackId() : string;

	/**
	 * @return int
	 */
	public function getPackSize() : int;

	/**
	 * @return string
	 */
	public function getPackVersion() : string;

	/**
	 * @return string
	 */
	public function getSha256() : string;

	/**
	 * @param int $start
	 * @param int $length
	 *
	 * @return string
	 */
	public function getPackChunk(int $start, int $length) : string;
}