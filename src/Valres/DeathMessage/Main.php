<?php

namespace Valres\DeathMessage;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements Listener
{
    use SingletonTrait;
    
    public function onEnable(): void {
        $this->getLogger()->info("by Valres est lancé.");
        $this->saveDefaultConfig();

        $this->getServer()->getPluginManager()->registerEvents(new PlayerDeath(), $this);
    }

    protected function onLoad(): void {
        self::setInstance($this);
    }
}
