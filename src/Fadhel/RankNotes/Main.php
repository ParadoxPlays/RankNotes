<?php

namespace Fadhel\RankNotes;

use Fadhel\RankNotes\commands\Rank;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public $rank;
    public function onEnable()
    {
        $this->rank = $this->getServer()->getPluginManager()->getPlugin("PurePerms");
        if($this->rank === null){
            $this->getLogger()->critical("PurePerms plugin not found!");
            $this->setEnabled(false);
            return;
        }
        $this->getServer()->getCommandMap()->register("ranknotes", new Rank($this));
        $this->getServer()->getPluginManager()->registerEvents(new Listeners($this), $this);
    }
}
