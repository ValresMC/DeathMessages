<?php

namespace Valres\DeathMessage;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements Listener
{
    use SingletonTrait;
    public function onEnable(): void
    {
        $this->getLogger()->info("est lancé.");
        @mkdir($this->getDataFolder());
        $this->saveResource("MessagesConfig.yml", true);
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new onDeathEvent(), $this);
    }

    protected function onLoad(): void
    {
        self::setInstance($this);
    }

    public function getMessage(): Config
    {
        return new Config($this->getDataFolder()."MessagesConfig.yml", Config::YAML);
    }
}
