<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;
use Tetranz\Select2EntityBundle\Service\AutocompleteService;

return static function (ContainerConfigurator $container) {
    $services = $container->services();

    $services->set('tetranz_select2entity.select2entity_type', Select2EntityType::class)
        ->args([
            service('doctrine'),
            service('router'),
            '%tetranz_select2_entity.config%',
        ])
        ->tag('form.type', ['alias' => 'tetranz_select2entity']);

    $services->set('tetranz_select2entity.autocomplete_service', AutocompleteService::class)
        ->args([
            service('form.factory'),
            service('doctrine'),
        ]);
};
