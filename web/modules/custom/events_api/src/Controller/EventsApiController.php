<?php

// namespace Drupal\events_api\Controller;

// use Drupal\Core\Controller\ControllerBase;
// use Symfony\Component\HttpFoundation\JsonResponse;
// use Drupal\node\Entity\Node;

// class EventsApiController extends ControllerBase {

//   public function upcoming() {
//     $query = \Drupal::entityQuery('node')
//       ->condition('type', 'event')
//       ->condition('status', 1)
//       ->condition('field_event_date', date('Y-m-d\TH:i:s'), '>=')
//       ->sort('field_event_date', 'ASC')
//       ->range(0, 10)
//       ->accessCheck(TRUE); // ✅ REQUIRED IN DRUPAL 11

//     $nids = $query->execute();
//     $nodes = Node::loadMultiple($nids);

//     $events = [];
//     foreach ($nodes as $node) {
//       $events[] = [
//         'id' => $node->id(),
//         'title' => $node->label(),
//         'date' => $node->get('field_event_date')->value,
//         'location' => $node->get('field_location')->value ?? '',
//         'category' => $node->get('field_category')->entity?->label(),
//         'summary' => $node->get('field_summary')->value ?? '',
//       ];
//     }

//     return new JsonResponse($events);
//   }

// }



namespace Drupal\events_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;

class EventsApiController extends ControllerBase {

  /**
   * API endpoint (JSON only)
   */
  public function upcoming() {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'event')
      ->condition('status', 1)
      ->condition('field_event_date', date('Y-m-d\TH:i:s'), '>=')
      ->sort('field_event_date', 'ASC')
      ->range(0, 10)
      ->accessCheck(TRUE);

    $nids = $query->execute();
    $nodes = Node::loadMultiple($nids);

    $events = [];
    foreach ($nodes as $node) {
      $events[] = [
        'id' => $node->id(),
        'title' => $node->label(),
        'date' => $node->get('field_event_date')->value,
        'location' => $node->get('field_location')->value ?? '',
        'category' => $node->get('field_category')->entity?->label(),
        'summary' => $node->get('field_summary')->value ?? '',
      ];
    }

    return new JsonResponse($events);
  }

  /**
   * THEMED page (Twig + CSS + JS)
   */
  public function page() {
    return [
      '#theme' => 'events_page',
      '#attached' => [
        'library' => [
          'events_theme/global',
        ],
      ],
    ];
  }

}

