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

namespace pocketmine\level;

use pocketmine\Player;
use pocketmine\entity\Creature;

/**
 * Based on MiNET
 */

class EntityManager{
	
	public $level;
	
	public function __construct(Level $level){
		$this->level = $level;
	}
	
	public function despawnMobs(int $tick){
		return; // deprecating floating text plugins
		if($tick % 400 == 0) {
            foreach ($this->level->getEntities() as $e) {
                if ($e instanceof Player) continue;
                if ($e instanceof Creature) {
                    if (count($e->getViewers()) == 0) {
                        $e->close();
                    }
                }
            }
        }
	}
	
	public function attemptMobs(int $tick){
		// TODO
	}
}