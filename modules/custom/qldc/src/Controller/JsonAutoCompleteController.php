<?php
namespace Drupal\qldc\Controller;

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
      ->condition('title', $input, 'CONTAINS')
      ->groupBy('nid')
      ->sort('created', 'DESC')
      ->range(0, 10);
    $ids = $query->execute();
      
    $nodes = $ids ? \Drupal\node\Entity\Node::loadMultiple($ids) : [];
    foreach ($nodes as $node) {
      //$dateTime  = $node->get('field_ngaysinh')->getValue()[0]['value'];
      //$date = DrupalDateTime::createFromFormat('Y-m-d', $dateTime);
      //$ngaysinh = $date->format('d/m/Y'); // format it 

      $results[] = [
        'value' => $node->getTitle(),
        'label' => $node->getTitle() . ' - ' . $node->get('field_ngaysinh')->getValue()[0]['value'],
      ];
    }
    return new JsonResponse($results);
  }
}
