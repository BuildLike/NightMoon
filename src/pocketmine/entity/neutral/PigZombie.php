<?php

namespace pocketmine\entity\neutral;

use pocketmine\entity\Entity;
use pocketmine\entity\Monster;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item as ItemItem;
use pocketmine\network\mcpe\protocol\AddEntityPacket;
use pocketmine\network\mcpe\protocol\MobEquipmentPacket;
use pocketmine\Player;
use pocketmine\entity\behavior\{StrollBehavior, RandomLookaroundBehavior, LookAtPlayerBehavior, PanicBehavior};

class PigZombie extends Monster {
	const NETWORK_ID = 36;
	public $width = 0.6;
	public $length = 0.6;
	public $height = 0;
	public $drag = 0.2;
	public $gravity = 0.3;
	public $dropExp = [5, 5];
	
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
	 * @return string
	 */
	public function getName() : string{
		return "PigZombie";
	}
	/**
	 * @param Player $player
	 */
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->entityRuntimeId = $this->getId();
		$pk->type = PigZombie::NETWORK_ID;
        $pk->position = $this->getPosition();
        $pk->motion = $this->getMotion();
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
		parent::spawnTo($player);
		$pk = new MobEquipmentPacket();
		$pk->entityRuntimeId = $this->getId();
		$pk->item = new ItemItem(283);
		$pk->slot = 0;
		$pk->selectedSlot = 0;
		$player->dataPacket($pk);
	}
	/**
	 * @return array
	 */
	public function getDrops(){
		$cause = $this->lastDamageCause;
		if($cause instanceof EntityDamageByEntityEvent){
			$damager = $cause->getDamager();
			if($damager instanceof Player){
				$lootingL = $damager->getItemInHand()->getEnchantmentLevel(Enchantment::TYPE_WEAPON_LOOTING);
				if(mt_rand(1, 200) <= (5 + 2 * $lootingL)){
					$drops[] = ItemItem::get(ItemItem::GOLD_INGOT, 0, 1);
				}
				$drops[] = ItemItem::get(ItemItem::GOLD_NUGGET, 0, mt_rand(0, 1 + $lootingL));
				$drops[] = ItemItem::get(ItemItem::ROTTEN_FLESH, 0, mt_rand(0, 1 + $lootingL));
				return $drops;
			}
		}
		return [];
	}
}
