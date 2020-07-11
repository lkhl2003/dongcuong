<?php

namespace Drupal\feeds\Feeds\Target;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\feeds\FieldTargetDefinition;
use Drupal\feeds\Plugin\Type\Target\ConfigurableTargetInterface;
use Drupal\feeds\Plugin\Type\Target\FieldTargetBase;

/**
 * Defines a password field mapper.
 *
 * @FeedsTarget(
 *   id = "password",
 *   field_types = {"password"}
 * )
 */
class Password extends FieldTargetBase implements ConfigurableTargetInterface {

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  protected static function prepareTarget(FieldDefinitionInterface $field_definition) {
    return FieldTargetDefinition::createFromFieldDefinition($field_definition)
      ->addProperty('value')
      ->setDescription("Password of this user.");
  }

  /**
   * {@inheritdoc}
   */
  protected function prepareValue($delta, array &$values) {
    $values['value'] = trim($values['value']);
    $values['pre_hashed'] = boolval($this->configuration['pre_hashed']);
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + ['pre_hashed' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $form['pre_hashed'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Passwords from source are pre-hashed.'),
      '#default_value' => $this->configuration['pre_hashed'],
      '#description' => $this->t('Check this if passwords from source are pre-hashed. Leave unchecked if passwords are in plain text format.'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getSummary() {
    $summary = parent::getSummary();

    $summary[] = $this->configuration['pre_hashed'] ?
      $this->t('Passwords are pre-hashed.') :
      $this->t('Passwords are in plain text format.');

    return $summary;
  }

}