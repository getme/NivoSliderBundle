<?php

namespace Sfk\NivoSliderBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

/**
 * SfkNivoSliderExtension
 *
 */
class SfkNivoSliderExtension extends Extension
{
    /**
     * {@inheritdoc}
     * 
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (empty($config['providers'])) {
            throw new \InvalidArgumentException('Nivo Slider requires at least one provider to be defined');
        }

        foreach ($config['providers'] as $name => $parameters) {
            $container->setParameter('sfk_nivo_slider.providers.'. $name, $parameters);    
        }
        
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}