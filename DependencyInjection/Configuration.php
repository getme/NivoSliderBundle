<?php

namespace Sfk\NivoSliderBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     * 
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sfk_nivo_slider');


        $rootNode
            ->children()
                ->arrayNode('providers')
                ->isRequired()
                ->requiresAtLeastOneElement()
                ->prototype('array')
                    ->children()
                        ->scalarNode('type')
                            ->isRequired()
                            ->validate()
                                ->ifNotInArray(array('controller'))
                                ->thenInvalid('Invalid source type "%s"')
                            ->end()
                        ->end()    
                        ->scalarNode('source')->isRequired()->end()
                        ->arrayNode('options')->end()
                ->end()
        ;
        
        return $treeBuilder;
    }

    public function getAlias()
    {
        return 'sfk_nivo_slider';
    }
}