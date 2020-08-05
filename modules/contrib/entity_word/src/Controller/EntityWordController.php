<?php

namespace Drupal\entity_word\Controller;

use Drupal\Core\Controller\ControllerBase;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Drupal\token\TokenInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\media\Entity\Media;

/**
 * Class EntityWordController.
 */
class EntityWordController extends ControllerBase {

  /**
   * Service to retrieve token information.
   *
   * @var \Drupal\token\TokenInterface
   */
  protected $token;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * The language manager service.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Drupal\Core\Config\ConfigFactoryInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The construct method.
   *
   * @param \Drupal\token\TokenInterface $token
   *   A token instance.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager service.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   */
  public function __construct(TokenInterface $token, EntityTypeManagerInterface $entity_type_manager, LanguageManagerInterface $language_manager, ConfigFactoryInterface $config_factory) {
    $this->token = $token;
    $this->entityTypeManager = $entity_type_manager;
    $this->languageManager = $language_manager;
    $this->configFactory = $config_factory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('token'),
      $container->get('entity_type.manager'),
      $container->get('language_manager'),
      $container->get('config.factory')
    );
  }

  /**
   * Method for download node content into word document.
   */
  public function nodeWord($node_id = NULL) {
    $node = $this->entityTypeManager->getStorage("node")->load($node_id);
    $language = $this->languageManager->getCurrentLanguage()->getId();
    // Get the data from config settings.
    $config = $this->configFactory->get('entity_word.settings');
    $doc_filename = $this->token->replace($config->get('entity_word_filename'),
       [$node->getEntityTypeId() => $node], ['langcode' => $language]);

    // Get file attachment link in document.
    $attached_media_url = '';
    if ($node->hasField('field_attach_pdf') && !$node->get('field_attach_pdf')->isEmpty()) {
      $media_target_id = isset($node->get('field_attach_pdf')->getValue()[0]['target_id']) ? $node->get('field_attach_pdf')->getValue()[0]['target_id'] : '';
      $attached_media_url = $this->mediaUrl($media_target_id);
    }

    // Instantiation of the class PhpWord.
    Settings::setOutputEscapingEnabled(TRUE);
    $phpWord = new PhpWord();
    $section = $phpWord->addSection(
      [
        'paperSize' => $config->get('entity_word_papersize'),
        'marginLeft' => $config->get('entity_word_margin_left'),
        'marginRight' => $config->get('entity_word_margin_right'),
        'marginTop' => $config->get('entity_word_margin_top'),
        'marginBottom' => $config->get('entity_word_margin_bottom'),
        'headerHeight' => 0,
        'footerHeight' => 0,
      ]
    );
    // Defining font style of the title and body.
    $fontStyle = new Font();
    $fontStyle->setBold(TRUE);
    $fontStyle->setName($config->get('entity_word_font_family'));
    $fontStyle->setColor($config->get('entity_word_font_color'));
    $fontStyle->setSize($config->get('entity_word_font_size'));
    $textElement = $section->addText($node->title->value);
    $textElement->setFontStyle($fontStyle);
    $textElement = $section->addTextRun();
    $body_text = str_replace("<p>",
    "<p style='" . $config->get('entity_word_paragraph_style') . "'>",
    $node->body->value);
    $body_text = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $body_text);
    Html::addHtml($section, $body_text, FALSE, FALSE);
    if (!empty($attached_media_url)) {
      $textElement = $section->addTextRun();
      $attached_media_url = '<a href="' . $attached_media_url . '">' . $attached_media_url . '</a>';
      Html::addHtml($section, $attached_media_url, FALSE, FALSE);
    }

    /* [OR FORCE DOWNLOAD] */
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment;filename="' . $doc_filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
    ob_clean();
    $objWriter->save('php://output');
    exit;
  }

  /**
   * Process media url.
   *
   * @param int $target_id
   *   Media target id of the file.
   */
  public function mediaUrl($target_id) {
    if ($target_id) {
      $media = Media::load($target_id);
      $fid = $media->getSource()->getSourceFieldValue($media);
      $file = $this->entityTypeManager->getStorage('file')->load($fid);
      return $file->toUrl()->toString();
    }
  }

}
