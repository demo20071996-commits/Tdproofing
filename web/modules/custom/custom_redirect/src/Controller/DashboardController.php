<?php

// namespace Drupal\custom_redirect\Controller;

// use Drupal\Core\Controller\ControllerBase;
// use Drupal\user\Entity\User;

// /**
//  * Dashboard Controller.
//  */
// class DashboardController extends ControllerBase
// {

//   /**
//    * Fetch company, journal and role TIDs + Labels for the logged-in user.
//    */
//   protected function getUserCompanyData()
//   {

//     $uid = \Drupal::currentUser()->id();
//     $user = User::load($uid);

//     if (!$user) {
//       \Drupal::logger('user_mapping')->error("User not found.");
//       return [];
//     }

//     // READ EXACT FIELD VALUES
//     $company_tid = $user->get('field_company')->target_id ?? 0;
//     $journal_tid = $user->get('field_journal')->target_id ?? 0;
//     $role_tid    = $user->get('field_role')->target_id ?? 0;

//     \Drupal::logger('user_mapping')->notice("UID $uid => C:$company_tid J:$journal_tid R:$role_tid");

//     // LOAD TERMS
//     $term_storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

//     $company = $company_tid ? $term_storage->load($company_tid) : NULL;
//     $journal = $journal_tid ? $term_storage->load($journal_tid) : NULL;
//     $role    = $role_tid ? $term_storage->load($role_tid) : NULL;

//     return [
//       'company_tid' => $company_tid,
//       'journal_tid' => $journal_tid,
//       'role_tid'    => $role_tid,
//       'company'     => $company ? $company->label() : '',
//       'journal'     => $journal ? $journal->label() : '',
//       'role'        => $role ? $role->label() : '',
//     ];
//   }
//   /**
//    * Editor Dashboard.
//    */

//   public function editor()
//   {

//     \Drupal::logger('dashboard_hit')->notice("EDITOR dashboard opened.");
//     $data = $this->getUserCompanyData();
//     \Drupal::logger('dashboard_debug')->notice('<pre>' . print_r($data, TRUE) . '</pre>');
//     $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
//     $theme_registry = \Drupal::service('theme.registry')->get();
//     if (!isset($theme_registry[$template])) {
//       \Drupal::logger('dashboard_hit')->notice("Template $template not found. Using fallback.");
//       $template = 'tdproofing_editor_dashboard';
//     }

//     $company_name = $data['company'] ?: 'Unknown Company';
//     return [
//       '#theme' => $template,
//       '#company_data' => $data,
//       '#user' => User::load(\Drupal::currentUser()->id()),
//       '#title' => 'Editor Dashboard',
//     ];
//   }


//   /**
//    * Typesetter Dashboard.
//    */
//   public function typesetter()
//   {
//     $data = $this->getUserCompanyData();
//     $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
//     $theme_registry = \Drupal::service('theme.registry')->get();
//     if (!isset($theme_registry[$template])) {
//       $template = 'tdproofing_typesetter_dashboard';
//     }
//     $company_name = $data['company'] ?: 'Unknown Company';

//     return [
//       '#theme' => $template,
//       '#company_data' => $data,
//       '#user' => User::load(\Drupal::currentUser()->id()),
//       '#title' => 'Typesetter Dashboard',
//          '#attached' => [
//         'library' => [
//           'custom_redirect/dependent_dropdowns'
//         ]
//       ],
//     ];

//   }


//   /**
//    * Author Dashboard.
//    */
//   public function author()
//   {

//     \Drupal::logger('dashboard_hit')->notice("AUTHOR dashboard opened.");
//     $data = $this->getUserCompanyData();
//     \Drupal::logger('dashboard_debug')->notice('<pre>' . print_r($data, TRUE) . '</pre>');
//     $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
//     $theme_registry = \Drupal::service('theme.registry')->get();
//     if (!isset($theme_registry[$template])) {
//       $template = 'tdproofing_author_dashboard';
//     }
//     $company_name = $data['company'] ?: 'Unknown Company';
//     return [
//       '#theme' => $template,
//       '#company_data' => $data,
//       '#user' => User::load(\Drupal::currentUser()->id()),
//       '#title' => 'Author Dashboard',
//     ];
//   }


//   /**
//    * Master Copy Dashboard.
//    */

//   public function mastercopy()
//   {
//     \Drupal::logger('dashboard_hit')->notice("MASTERCOPY dashboard opened.");
//     print "MASTER COPY WORKING!";
//     exit;
//     \Drupal::logger('dashboard_hit')->notice("MASTERCOPY dashboard opened.");
//     $data = $this->getUserCompanyData();
//     \Drupal::logger('dashboard_debug')->notice('<pre>' . print_r($data, TRUE) . '</pre>');
//     $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
//     $theme_registry = \Drupal::service('theme.registry')->get();
//     if (!isset($theme_registry[$template])) {
//       $template = 'tdproofing_mastercopy_dashboard';
//     }
//     $company_name = $data['company'] ?: 'Unknown Company';
//     return [
//       '#theme' => $template,
//       '#company_data' => $data,
//       '#user' => User::load(\Drupal::currentUser()->id()),
//       '#title' => 'Master Copy Dashboard',
//     ];
//   }
// }




namespace Drupal\custom_redirect\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Entity\User;

/**
 * Dashboard Controller.
 */
class DashboardController extends ControllerBase {

  /**
   * Helper function: Fetch company, journal, and role for the current user.
   */
  protected function getUserCompanyData() {

    $uid = \Drupal::currentUser()->id();
    $user = User::load($uid);

    if (!$user) {
      \Drupal::logger('custom_redirect')->error("User not found: UID $uid");
      return [];
    }

    // Try tempstore first
    $temp = \Drupal::service('tempstore.private')->get('custom_redirect');
    $company_tid = $temp->get('user_company_tid');

    if (!$company_tid) {
      $company_tid = $user->get('field_company')->target_id ?? 0;
    }

    $journal_tid = $user->get('field_journal')->target_id ?? 0;
    $role_tid    = $user->get('field_role')->target_id ?? 0;

    $term_storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');

    return [
      'company_tid' => $company_tid,
      'journal_tid' => $journal_tid,
      'role_tid'    => $role_tid,
      'company'     => $company_tid ? $term_storage->load($company_tid)->label() : '',
      'journal'     => $journal_tid ? $term_storage->load($journal_tid)->label() : '',
      'role'        => $role_tid ? $term_storage->load($role_tid)->label() : '',
    ];
  }

  /**
   * Editor Dashboard.
   */
  public function editor() {
    $data = $this->getUserCompanyData();

    // Determine theme template dynamically
    $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
    $theme_registry = \Drupal::service('theme.registry')->get();
    if (!isset($theme_registry[$template])) {
      $template = 'tdproofing_editor_dashboard';
    }

  //   return [
  //     '#theme' => $template,
  //     '#company_data' => $data,
  //     '#user' => User::load(\Drupal::currentUser()->id()),
  //     '#title' => 'Editor Dashboard',
  //     '#attached' => [
  //       'library' => ['custom_redirect/dependent_dropdowns'],
  //     ],
  //   ];
  // }

  return [
  '#theme' => 'tdproofing_editor_dashboard',
    '#company_data' => $data,
     '#user' => User::load(\Drupal::currentUser()->id()),
        '#title' => 'Editor Dashboard',
          '#attached' => [
             'library' => ['custom_redirect/dependent_dropdowns'],
  ],
];
 }

  /**
   * Typesetter Dashboard.
   */
  public function typesetter() {
    $data = $this->getUserCompanyData();

    $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
    $theme_registry = \Drupal::service('theme.registry')->get();
    if (!isset($theme_registry[$template])) {
      $template = 'tdproofing_typesetter_dashboard';
    }

    return [
      '#theme' => $template,
      '#company_data' => $data,
      '#user' => User::load(\Drupal::currentUser()->id()),
      '#title' => 'Typesetter Dashboard',
      '#attached' => [
        'library' => ['custom_redirect/dependent_dropdowns'],
      ],
    ];
  }

  /**
   * Author Dashboard.
   */
  public function author() {
    $data = $this->getUserCompanyData();

    $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
    $theme_registry = \Drupal::service('theme.registry')->get();
    if (!isset($theme_registry[$template])) {
      $template = 'tdproofing_author_dashboard';
    }

  //   return [
  //     '#theme' => $template,
  //     '#company_data' => $data,
  //     '#user' => User::load(\Drupal::currentUser()->id()),
  //     '#title' => 'Author Dashboard',
  //   ];
  // }

   return [
    '#theme' => $template,
    '#company_data' => $data,
    '#user' => User::load(\Drupal::currentUser()->id()),
    '#title' => 'Author Dashboard',

    // ⭐ Attach dashboard CSS + JS here
    '#attached' => [
      'library' => [
        'custom_redirect/dependent_dropdowns',
      ],
    ],
  ];
}

  /**
   * Master Copy Dashboard.
   */
  public function mastercopy() {
    $data = $this->getUserCompanyData();

    $template = "tdproofing_dashboard_{$data['company_tid']}_{$data['role_tid']}";
    $theme_registry = \Drupal::service('theme.registry')->get();
    if (!isset($theme_registry[$template])) {
      $template = 'tdproofing_mastercopy_dashboard';
    }

    return [
      '#theme' => $template,
      '#company_data' => $data,
      '#user' => User::load(\Drupal::currentUser()->id()),
      '#title' => 'Master Copy Dashboard',
    ];
  }

}
