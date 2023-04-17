<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel implements CompilerPassInterface
{
    use MicroKernelTrait;

    protected function build(ContainerBuilder $container)
    {
//       says: any service that implements the GameObserverInterface should automatically be given the game.observer tag
        $container->registerForAutoconfiguration(GameObserverInterface::class)
            ->addTag('game.observer');
    }

    //compiler pass runs at the end of the container and services being built
    public function process(ContainerBuilder $container)
    {
        $definition = $container->findDefinition(GameApplication::class);
        //finds all services with the game.observer tag
        $taggedObservers = $container->findTaggedServiceIds('game.observer');
        foreach($taggedObservers as $id=>$tags){
            //This is a fancy way of saying that we want the subscribe() method to be called on GameApplication...
            //and for it to pass the service that holds the game.observer tag.
//            $definition->addMethodCall('subscribe', [new Reference($id)]);
        }
    }
}
