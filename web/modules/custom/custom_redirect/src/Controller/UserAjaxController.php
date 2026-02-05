<?php

namespace Drupal\custom_redirect\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Ajax controller for dependent taxonomy dropdowns.
 */
class UserAjaxController extends ControllerBase {

  /**
   * Return journals for a given company term id.
   *
   * NOTE: Adjust 'journal' vocab name and 'field_company_ref' below
   * to match your site configuration.
   */
  public function getJournals($company_tid) {
    $storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

    // Query terms in 'journal' vocabulary that reference the company by field_company_ref.
    $query = \Drupal::entityQuery('taxonomy_term')
      ->condition('vid', 'journal')
      ->condition('field_company_ref.target_id', (int) $company_tid);
    $tids = $query->execute();
    if (empty($tids)) {
      return new JsonResponse([]);
    }

    $terms = $storage->loadMultiple($tids);
    $result = [];
    foreach ($terms as $term) {
      $result[] = [
        'tid' => $term->id(),
        'name' => $term->getName(),
      ];
    }
    return new JsonResponse($result);
  }

  /**
   * Return roles for a given journal term id.
   *
   * NOTE: Adjust 'role' vocab name and 'field_journal_ref' below
   * to match your site configuration.
   */
  public function getRoles($journal_tid) {
    $storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

    $query = \Drupal::entityQuery('taxonomy_term')
      ->condition('vid', 'role')
      ->condition('field_journal_ref.target_id', (int) $journal_tid);
    $tids = $query->execute();
    if (empty($tids)) {
      return new JsonResponse([]);
    }

    $terms = $storage->loadMultiple($tids);
    $result = [];
    foreach ($terms as $term) {
      $result[] = [
        'tid' => $term->id(),
        'name' => $term->getName(),
      ];
    }
    return new JsonResponse($result);
  }

}
