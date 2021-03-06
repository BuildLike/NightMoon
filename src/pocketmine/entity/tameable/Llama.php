<?php

namespace pocketmine\entity\tameable;

use pocketmine\entity\Animal;
use pocketmine\entity\Entity;
use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\Player;

use pocketmine\entity\behavior\{StrollBehavior, RandomLookaroundBehavior, LookAtPlayerBehavior, PanicBehavior};

class Llama extends Animal {
	const NETWORK_ID = 29;

	const CREAMY = 0;
	const WHITE = 1;
	const BROWN = 2;
	const GRAY = 3;

	public $width = 0.3;
	public $length = 0.9;
	public $height = 0;

	public $dropExp = [1, 3];
	public $drag = 0.2;
	public $gravity = 0.3;

	/**
	 * @return string
	 */
	public function getName(){
		return "Llama";
	}

	public function initEntity(){
        $this->addBehavior(new PanicBehavior($this, 0.25, 2.0));
        $this->addBehavior(new StrollBehavior($this));
        $this->addBehavior(new LookAtPlayerBehavior($this));
        $this->addBehavior(new RandomLookaroundBehavior($this));

		$this->setMaxHealth(30);
		$this->setDataProperty(Entity::DATA_VARIANT, Entity::DATA_TYPE_INT, rand(0, 3));
		parent::initEntity();
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

	/**
	 * @return array
	 */
	public function getDrops(){
		$drops = [
			ItemItem::get(ItemItem::LEATHER, 0, mt_rand(0, 2))
		];

		return $drops;
	}
}
