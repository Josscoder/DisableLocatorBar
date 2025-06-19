<?php

namespace Josscoder\DisableLocateBar;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\network\mcpe\protocol\types\BoolGameRule;
use pocketmine\plugin\PluginBase;

class DisableLocateBarPlugin extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $event): void
    {
        $packet = GameRulesChangedPacket::create(
            [
                "locatorBar" => new BoolGameRule(false, false)
            ]
        );

        $event->getPlayer()->getNetworkSession()->sendDataPacket($packet);
    }
}