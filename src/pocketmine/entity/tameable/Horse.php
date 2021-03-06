<?php

namespace pocketmine\entity\tameable;

use pocketmine\entity\Animal;
use pocketmine\entity\Entity;
use pocketmine\Player;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\network\mcpe\protocol\MobArmorEquipmentPacket;
use pocketmine\item\Item as ItemItem;

use pocketmine\entity\behavior\{StrollBehavior, RandomLookaroundBehavior, LookAtPlayerBehavior, PanicBehavior};

class Horse extends Animal{

	const NETWORK_ID = 23;
	public $width = 0.3;
	public $length = 0.9;
	public $height = 0;
	public $drag = 0.2;
	public $gravity = 0.3;
	const CREAMY = 0;
	const WHITE = 1;
	const BROWN = 2;
	const GRAY = 3;
	const BLACK = 4;
	public function initEntity(){
		$this->addBehavior(new PanicBehavior($this, 0.25, 2.0));
		$this->addBehavior(new StrollBehavior($this));
		$this->addBehavior(new LookAtPlayerBehavior($this));
		$this->addBehavior(new RandomLookaroundBehavior($this));
		$this->setDataProperty(Entity::DATA_VARIANT, Entity::DATA_TYPE_INT, rand(0, 4));
                $this->setMaxHealth(30);
		parent::initEntity();
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		return "Horse";
	}

	/**
	 * @param $id
	 */
	public function setChestPlate($id){
		/*	
		416, 417, 418, 419 only
		*/
		$pk = new MobArmorEquipmentPacket();
		$pk->entityRuntimeId = $this->getId();
		$pk->slots = [
			ItemItem::get(0, 0),
			ItemItem::get($id, 0),
			ItemItem::get(0, 0),
			ItemItem::get(0, 0)
		];
		foreach($this->level->getPlayers() as $player){
			$player->dataPacket($pk);
		}
	}

	/**
	 * @param Player $player
	 */
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
        $pk->entityRuntimeId = $this->getId();
		$pk->type = self::NETWORK_ID;
        $pk->position = $this->getPosition();
        $pk->motion = $this->getMotion();
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);

		parent::spawnTo($player);
	}

}
