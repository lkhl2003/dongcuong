<?php
/**
 * My controller
 *
 */
namespace Drupal\qldc\Controller;

use Drupal\Core\DateTime\DrupalDateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\Xss;
use Drupal\Core\Entity\Element\EntityAutocomplete;
/**
 * Defines a route controller for watches autocomplete form elements.
 */
class JsonAutoCompleteController {
  public function hovaten(Request $request) {
    $results = [];
    $input = $request->query->get('q');
    if (!$input) {
      return new JsonResponse($results);
    }
    $input = Xss::filter($input);
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'congdan')
      ->condition('title', $input, 'STARTS_WITH')
      //->groupBy('nid')
      ->sort('title', 'asc')
      ->range(0, 10);
    $ids = $query->execute();

    $nodes = $ids ? \Drupal\node\Entity\Node::loadMultiple($ids) : [];
    foreach ($nodes as $node) {
      $dates = explode('-', $node->get('field_ngaysinh')->getValue()[0]['value']);
      $results[] = [
        'value' => $node->getTitle() . '-' . $node->id(),
        //'label' => $node->getTitle() . ' - ' . $node->get('field_ngaysinh')->getValue()[0]['value'],
       'label' => $node->getTitle() . ' - ' . $dates[2] . '/' . $dates[1]  . '/' . $dates[0],
      ];
    }
    return new JsonResponse($results);
  }
  private function test($date_str) {

      $date = new DrupalDateTime($date_str, 'UTC');
      return $date->format("d/m/Y");

  }
}
