<?php

/**
 * @file
 * Post update hooks for farm_seed_asset_extended.
 */

declare(strict_types=1);

/**
 * Add "Seed URL" to seed assets.
 */
function farm_seed_asset_extended_post_update_add_seed_url(&$sandbox) {
    $options = [
      'type' => 'uri',
      'label' => t('Seed URL'),
      'description' => t('URL where the seeds were purchased.'),
      'weight' => [
        'form' => 10,
        'view' => 10,
      ],
    ];
    $field_definition = \Drupal::service('farm_field.factory')->bundleFieldDefinition($options);
    \Drupal::entityDefinitionUpdateManager()->installFieldStorageDefinition('seed_url', 'asset', 'farm_seed_asset_extended', $field_definition);
    \Drupal::service('entity_field.manager')->rebuildBundleFieldMap();
}