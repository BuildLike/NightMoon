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

namespace pocketmine\command\overload;

class CommandOverload{
	
	protected $name;
	protected $params = [];
	
	public function __construct(string $name, array $params = []){
		$this->params = $params;
		$this->name = $name;
	}
	
	public function getName() : string{
		return $this->name;
	}
	
	public function getParameters() : array{
		return $this->params;
	}
	
	public function setParameter(int $index, CommandParameter $param){
		$this->params[$index] = $param;
	}
}
?>
