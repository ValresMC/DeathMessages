<?php

namespace Valres\DeathMessage;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;

class PlayerDeath implements Listener
{
    private array $messages = [];

    public function __construct() {
        foreach(Main::getInstance()->getConfig()->getAll() as $type => $message){
            $this->messages[$type] = $message;
        }
    }

    public function onDeath(PlayerDeathEvent $event): void {
        $player = $event->getPlayer();
        $cause = $player->getLastDamageCause();

        $event->setDeathMessage(str_replace(
            "{player}",
            $player->getName(),
            match($cause->getCause()){
                EntityDamageEvent::CAUSE_VOID => $this->messages["void-death"],
                EntityDamageEvent::CAUSE_FIRE => $this->messages["fire-death"],
                EntityDamageEvent::CAUSE_LAVA => $this->messages["lava-death"],
                EntityDamageEvent::CAUSE_DROWNING => $this->messages["water-death"],
                EntityDamageEvent::CAUSE_SUICIDE => $this->messages["suicide-death"],
                EntityDamageEvent::CAUSE_FALL => $this->messages["fall-death"],
                EntityDamageEvent::CAUSE_SUFFOCATION => $this->messages["suffocation-death"],
                EntityDamageEvent::CAUSE_FIRE_TICK => $this->messages["fire-tick-death"],
                EntityDamageEvent::CAUSE_PROJECTILE => $this->messages["projectile-death"],
                EntityDamageEvent::CAUSE_ENTITY_EXPLOSION => $this->messages["explosion-death"],
                EntityDamageEvent::CAUSE_MAGIC => $this->messages["poison-death"],
                EntityDamageEvent::CAUSE_STARVATION => $this->messages["feed-death"],
                EntityDamageEvent::CAUSE_FALLING_BLOCK => $this->messages["falling-block-death"],
                default => $this->messages["default"]
            })
        );
    }
}
