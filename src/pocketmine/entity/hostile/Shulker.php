<?php

/*
 *
 *  _____            _               _____           
 * / ____|          (_)             |  __ \          
 *| |  __  ___ _ __  _ ___ _   _ ___| |__) | __ ___  
 *| | |_ |/ _ \ '_ \| / __| | | / __|  ___/ '__/ _ \ 
 *| |__| |  __/ | | | \__ \ |_| \__ \ |   | | | (_) |
 * \_____|\___|_| |_|_|___/\__, |___/_|   |_|  \___/ 
 *                         __/ |                    
 *                        |___/                     
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author Turanic
 * @link https://github.com/Turanic/Turanic
 *
 *
 */

namespace pocketmine\entity\hostile;

use pocketmine\entity\Entity;
use pocketmine\entity\Monster;
use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;
use pocketmine\entity\behavior\{StrollBehavior, RandomLookaroundBehavior, LookAtPlayerBehavior, PanicBehavior};

class Shulker extends Monster {
	const NETWORK_ID = 54;

	public $width = 0.5;
	public $length = 0.9;
	public $height = 0;

	public $dropExp = [5, 5];


	/**
	 * @return string
	 */
	public function getName() : string{
		return "Shulker";
	}

	public function initEntity(){
			$this->addBehavior(new PanicBehavior($this, 0.25, 2.0));
			$this->addBehavior(new StrollBehavior($this));
			$this->addBehavior(new LookAtPlayerBehavior($this));
			$this->addBehavior(new RandomLookaroundBehavior($this));
		$this->setMaxHealth(30);
		$this->setDataProperty(Entity::DATA_VARIANT, Entity::DATA_TYPE_INT, 10);
		parent::initEntity();
	}

	/**
	 * @param Player $player
	 */
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->entityRuntimeId = $this->getId();
		$pk->type = Shulker::NETWORK_ID;
        $pk->position = $this->getPosition();
        $pk->motion = $this->getMotion();
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
		parent::spawnTo($player);
	}

	/**
	 * @return array
	 */
	public function getDrops(){
		$drops = [
			ItemItem::get(ItemItem::SHULKER_SHELL, 0, mt_rand(0, 1))
		];

		return $drops;
	}
}
