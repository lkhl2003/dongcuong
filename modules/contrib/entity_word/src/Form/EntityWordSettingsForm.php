<?php

namespace Drupal\entity_word\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class EntityWordSettingsForm.
 */
class EntityWordSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'entity_word_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'entity_word.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('entity_word.settings');
    $options = [
      'A4' => $this->t('A4'),
      'Legal' => $this->t('Legal'),
      'Letter' => $this->t('Letter'),
      'Folio' => $this->t('Folio'),
    ];
    $form['entity_word_filename'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filename for generated Word document.'),
      '#default_value' => $config->get('entity_word_filename') ?: '[node:nid].docx',
      '#description' => $this->t('You can use node tokens. Supported file extension docx only.'),
    ];

    // Field set for papers layout.
    $form['paper_layout'] = [
      '#type' => 'details',
      '#title' => $this->t('Paper settings'),
      '#open' => FALSE,
    ];
    $form['paper_layout']['entity_word_papersize'] = [
      '#type' => 'select',
      '#title' => $this->t('Paper size'),
      '#options' => $options,
      '#default_value' => $config->get('entity_word_papersize'),
      '#description' => $this->t('You can choose paper size.'),
    ];
    $form['paper_layout']['entity_word_margin_top'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Margin top'),
      '#default_value' => $config->get('entity_word_margin_top'),
      '#description' => $this->t('You can enter margin top without px.'),
    ];
    $form['paper_layout']['entity_word_margin_bottom'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Margin bottom'),
      '#default_value' => $config->get('entity_word_margin_bottom'),
      '#description' => $this->t('You can enter margin bottom without px.'),
    ];
    $form['paper_layout']['entity_word_margin_left'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Margin left'),
      '#default_value' => $config->get('entity_word_margin_left'),
      '#description' => $this->t('You can enter margin left without px.'),
    ];
    $form['paper_layout']['entity_word_margin_right'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Margin right'),
      '#default_value' => $config->get('entity_word_margin_right'),
      '#description' => $this->t('You can enter margin right without px.'),
    ];

    // Field set for Word title fonts.
    $form['title_font_layout'] = [
      '#type' => 'details',
      '#title' => $this->t('Title font settings'),
      '#open' => FALSE,
    ];
    $form['title_font_layout']['entity_word_font_family'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font family'),
      '#default_value' => $config->get('entity_word_font_family'),
      '#description' => $this->t('You can enter font family (Arial, Helvetica, sans-serif;).'),
    ];

    $form['title_font_layout']['entity_word_font_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font color'),
      '#default_value' => $config->get('entity_word_font_color'),
      '#description' => $this->t('You can enter font color without # (000000).'),
    ];

    $form['title_font_layout']['entity_word_font_size'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Font size'),
      '#default_value' => $config->get('entity_word_font_size'),
      '#description' => $this->t('You can enter font size without px (24).'),
    ];

    $form['entity_word_paragraph_style'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Paragraph style'),
      '#default_value' => $config->get('entity_word_paragraph_style'),
      '#description' => $this->t('You can enter node body style (font-size: 16px;font-family: Arial, Helvetica, sans-serif;color: #000; line-height: 120%;).'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('entity_word.settings');
    $config->set('entity_word_filename', $form_state->getValue('entity_word_filename'));
    $config->set('entity_word_papersize', $form_state->getValue('entity_word_papersize'));
    $config->set('entity_word_margin_top', $form_state->getValue('entity_word_margin_top'));
    $config->set('entity_word_margin_bottom', $form_state->getValue('entity_word_margin_bottom'));
    $config->set('entity_word_margin_left', $form_state->getValue('entity_word_margin_left'));
    $config->set('entity_word_margin_right', $form_state->getValue('entity_word_margin_right'));
    $config->set('entity_word_font_family', $form_state->getValue('entity_word_font_family'));
    $config->set('entity_word_font_color', $form_state->getValue('entity_word_font_color'));
    $config->set('entity_word_font_size', $form_state->getValue('entity_word_font_size'));
    $config->set('entity_word_paragraph_style', $form_state->getValue('entity_word_paragraph_style'));
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
