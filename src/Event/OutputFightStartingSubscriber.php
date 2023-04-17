<?php

namespace App\Event;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OutputFightStartingSubscriber implements EventSubscriberInterface
{
    public function onFightStart(FightStartingEvent $event)
    {
        $io = new SymfonyStyle(new ArrayInput([]), new ConsoleOutput());

        $io->note('Fight is starting against' . $event->ai->getNickname());
    }

    //basically says 'when the FightStartingEvent happens, I want you to call onFightStart function
    public static function getSubscribedEvents()
    {
        return [
            FightStartingEvent::class => 'onFightStart'
        ];
    }
}