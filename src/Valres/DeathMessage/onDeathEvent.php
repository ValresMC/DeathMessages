<?php

namespace Valres\DeathMessage;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDeathEvent;

class onDeathEvent implements Listener
{
    public function onDeath(PlayerDeathEvent $event): void
    {
        $cause = $event->getPlayer()->getLastDamageCause();
        $player = $event->getPlayer()->getName();
        if($cause->getCause() === EntityDamageEvent::CAUSE_VOID){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("void-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_FIRE){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("fire-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_LAVA){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("lava-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_DROWNING){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("water-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_SUICIDE){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("suicide-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_FALL){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("fall-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_SUFFOCATION){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("suffocation-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_FIRE_TICK){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("fire-tick-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_PROJECTILE){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("projectile-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_ENTITY_EXPLOSION){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("explosion-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_MAGIC){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("poison-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_STARVATION){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("feed-death"));
        }
        elseif($cause->getCause() === EntityDamageEvent::CAUSE_FALLING_BLOCK){
            $message = str_replace("{player}", $player, Main::getInstance()->getMessage()->get("falling-block-death"));
        }
        else $message = str_replace("{player}", $player, "{player} est mort.");

        $event->setDeathMessage("$message");
    }
}
