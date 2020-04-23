<?php

declare(strict_types=1);

namespace Fadhel\RankNotes;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat;

class Listeners implements Listener
{
    /**
     * @var Main
     */
    protected $plugin;

    /**
     * Listeners constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    /**
     * @param PlayerInteractEvent $event
     */
    public function onInteract(PlayerInteractEvent $event): void
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_AIR and $item->getNamedTagEntry("rank") !== null) {
            $rank = $this->plugin->rank->getGroup($item->getNamedTag()->getString("rank"));
            if ($rank === null) {
                $player->sendMessage(TextFormat::RED . "Couldn't find that rank. The rank might be removed, contact the admins of the server to report this problem.");
                return;
            }
            if($this->plugin->rank->getUserDataMgr()->getGroup($player)->getName() === $rank->getName()){
                $player->sendMessage(TextFormat::RED . "Your rank is already " . $rank->getName() .  '.');
                return;
            }
            $this->plugin->rank->setGroup($player, $rank);
            $item->pop();
            $player->getInventory()->setItemInHand($item);
            $player->sendMessage(TextFormat::GOLD . "Successfully redeemed the " . TextFormat::RED . $rank->getName() . TextFormat::GOLD . " rank.");
        }
    }
}