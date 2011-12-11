<?php

namespace Club\BookingBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ClubBookingExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('listener.yml');

        $container->setParameter('club_booking.enable_guest', $config['enable_guest']);
        $container->setParameter('club_booking.num_book_guest_day', $config['num_book_guest_day']);
        $container->setParameter('club_booking.num_book_guest_future', $config['num_book_guest_future']);
        $container->setParameter('club_booking.num_book_same_partner_day', $config['num_book_same_partner_day']);
        $container->setParameter('club_booking.num_book_same_partner_future', $config['num_book_same_partner_future']);
        $container->setParameter('club_booking.num_book_day', $config['num_book_day']);
        $container->setParameter('club_booking.num_book_future', $config['num_book_future']);
        $container->setParameter('club_booking.cancel_minute_before', $config['cancel_minute_before']);
        $container->setParameter('club_booking.cancel_minute_created', $config['cancel_minute_created']);
    }
}