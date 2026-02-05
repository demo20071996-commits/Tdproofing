<?php

// namespace Drupal\custom_redirect\EventSubscriber;

// use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// use Symfony\Component\HttpKernel\KernelEvents;
// use Symfony\Component\HttpKernel\Event\RequestEvent;
// use Drupal\Core\Session\AccountProxyInterface;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Drupal\Core\Url;

// class LoginRedirectSubscriber implements EventSubscriberInterface {

//   protected $currentUser;

//   public function __construct(AccountProxyInterface $current_user) {
//     $this->currentUser = $current_user;
//   }

//   public static function getSubscribedEvents() {
//     return [
//       KernelEvents::REQUEST => ['redirectAfterLogin', 100],
//     ];
//   }

//   public function redirectAfterLogin(RequestEvent $event) {

//     // Get request
//     $request = $event->getRequest();

//     // Only fire after login (?check_logged_in=1)
//     if ($request->query->get('check_logged_in') == 1) {

//       // Only if logged in
//       if ($this->currentUser->isAuthenticated()) {

//         // Only redirect Typesetter
//         if ($this->currentUser->hasRole('typesetter')) {

//           // Redirect to dashboard
//           $url = Url::fromUri('internal:/typesetter-dashboard')->toString();
//           $event->setResponse(new RedirectResponse($url));
//         }

//         if ($this->currentUser->hasRole('editor')) {

//           // Redirect to dashboard
//           $url = Url::fromUri('internal:/editor-dashboard')->toString();
//           $event->setResponse(new RedirectResponse($url));
//         }

//         if ($this->currentUser->hasRole('author')) {

//           // Redirect to dashboard
//           $url = Url::fromUri('internal:/author-dashboard')->toString();
//           $event->setResponse(new RedirectResponse($url));
//         }
//       }
//     }
//   }
// }


// namespace Drupal\custom_redirect\EventSubscriber;

// use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// use Symfony\Component\HttpKernel\KernelEvents;
// use Symfony\Component\HttpKernel\Event\RequestEvent;
// use Drupal\Core\Session\AccountProxyInterface;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Drupal\Core\Url;
// use Drupal\taxonomy\Entity\Term;
// use Drupal\user\Entity\User;

// class LoginRedirectSubscriber implements EventSubscriberInterface {

//   protected $currentUser;

//   public function __construct(AccountProxyInterface $current_user) {
//     $this->currentUser = $current_user;
//   }

//   public static function getSubscribedEvents() {
//     return [
//       KernelEvents::REQUEST => ['redirectAfterLogin', 100],
//     ];
//   }

//   public function redirectAfterLogin(RequestEvent $event) {

//     $request = $event->getRequest();

//     // Only fire after login
//     if ($request->query->get('check_logged_in') != 1) {
//       return;
//     }

//     if (!$this->currentUser->isAuthenticated()) {
//       return;
//     }

//     \Drupal::logger('custom_redirect')->notice('Redirect triggered.');

//     $user = User::load($this->currentUser->id());
//     if (!$user) {
//       \Drupal::logger('custom_redirect')->error('User not loaded.');
//       return;
//     }

//     // ----------------------------------------
//     // 🔥 UPDATE THESE FIELD NAMES TO MATCH YOUR SITE
//     // ----------------------------------------
//     $field_company = 'field_company_types';
//     $field_journal = 'field_journal';
//     $field_role    = 'field_user_job_role';
//     // ----------------------------------------

//     // Check that fields exist
//     foreach ([$field_company, $field_journal, $field_role] as $field) {
//       if (!$user->hasField($field)) {
//         \Drupal::logger('custom_redirect')->error("User missing field: $field");
//       }
//     }

//     // Get term IDs
//     $company_tid = $user->get($field_company)->target_id ?? null;
//     $journal_tid = $user->get($field_journal)->target_id ?? null;
//     $role_tid    = $user->get($field_role)->target_id ?? null;

//     // Convert TIDs to names
//     $company = $company_tid ? Term::load($company_tid)->label() : 'NONE';
//     $journal = $journal_tid ? Term::load($journal_tid)->label() : 'NONE';
//     $role    = $role_tid ? Term::load($role_tid)->label() : 'NONE';

//     // Log values
//     \Drupal::logger('custom_redirect')->notice("Company: $company | Journal: $journal | Role: $role");

//     // ----------------------------------------
//     // 🔥 STOP REDIRECT IF REQUIRED VALUES ARE MISSING
//     // ----------------------------------------
//     if ($company === 'NONE') {
//       \Drupal::logger('custom_redirect')->warning("No company selected — redirect stopped.");
//       return;
//     }

//     if ($journal === 'NONE') {
//       \Drupal::logger('custom_redirect')->warning("No journal selected — redirect stopped.");
//       return;
//     }

//     if ($role === 'NONE') {
//       \Drupal::logger('custom_redirect')->warning("No job role selected — redirect stopped.");
//       return;
//     }
//     // ----------------------------------------

//     // ----------------------------------------
//     // 🔥 DYNAMIC REDIRECT BASED ON ROLE (WORKING)
//     // ----------------------------------------
//     if ($role === 'Typesetter') {
//       $event->setResponse(new RedirectResponse('/typesetter-dashboard'));
//       return;
//     }

//     if ($role === 'Editor') {
//       $event->setResponse(new RedirectResponse('/editor-dashboard'));
//       return;
//     }
//     // ----------------------------------------

//     // No matching redirect
//     \Drupal::logger('custom_redirect')->notice("No redirect rule for role: $role");
//   }
// }


// namespace Drupal\custom_redirect\EventSubscriber;

// use Symfony\Component\EventDispatcher\EventSubscriberInterface;
// use Symfony\Component\HttpKernel\KernelEvents;
// use Symfony\Component\HttpKernel\Event\RequestEvent;
// use Drupal\Core\Session\AccountProxyInterface;
// use Symfony\Component\HttpFoundation\RedirectResponse;
// use Drupal\Core\Url;

// class LoginRedirectSubscriber implements EventSubscriberInterface {

//   /**
//    * The current user.
//    *
//    * @var \Drupal\Core\Session\AccountProxyInterface
//    */
//   protected $currentUser;

//   public function __construct(AccountProxyInterface $current_user) {
//     $this->currentUser = $current_user;
//   }

//   public static function getSubscribedEvents() {
//     return [
//       KernelEvents::REQUEST => ['redirectAfterLogin', 100],
//     ];
//   }

//   public function redirectAfterLogin(RequestEvent $event) {
//     // Compatibility: Symfony 5+ uses isMainRequest(), older uses isMasterRequest().
//     if (method_exists($event, 'isMainRequest')) {
//       if (!$event->isMainRequest()) {
//         return;
//       }
//     }
//     else {
//       if (!$event->isMasterRequest()) {
//         return;
//       }
//     }

//     // Get request and ensure we have a Request object.
//     $request = $event->getRequest();
//     if (!$request) {
//       return;
//     }

//     // Only handle safe GET HTML page loads to avoid interfering with
//     // asset/XHR/REST requests and avoid bootstrap timing issues.
//     if (!$request->isMethod('GET')) {
//       return;
//     }

//     // If request format is set and it is not html, skip.
//     $format = $request->getRequestFormat(NULL);
//     if ($format !== NULL && $format !== 'html') {
//       return;
//     }

//     // Only proceed when our special param is present.
//     // Use loose comparison to tolerate ?check_logged_in=1 or ?check_logged_in=true
//     if ($request->query->get('check_logged_in') != 1) {
//       return;
//     }

//     // Ensure user is authenticated
//     if (!$this->currentUser->isAuthenticated()) {
//       return;
//     }

//     /** ---------------------------------
//      *  DYNAMIC ROLE → DASHBOARD mapping
//      * --------------------------------- */
//     $redirects = [
//       'typesetter'  => '/typesetter-dashboard',
//       'editor'      => '/editor-dashboard',
//       'author'      => '/author-dashboard',
//       'mastercopy'  => '/mastercopy-dashboard',
//     ];

//     /** ---------------------------------
//      *  Loop through roles & redirect
//      * --------------------------------- */
//     foreach ($redirects as $role => $path) {
//       if ($this->currentUser->hasRole($role)) {
//         $url = Url::fromUri('internal:' . $path)->toString();
//         $event->setResponse(new RedirectResponse($url));
//         return;
//       }
//     }
//   }
// }

namespace Drupal\custom_redirect\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\user\Entity\User;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\Core\Url;

class LoginRedirectSubscriber implements EventSubscriberInterface {

  protected $currentUser;

  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  public static function getSubscribedEvents() {
    return [
      KernelEvents::REQUEST => ['redirectAfterLogin', 100],
    ];
  }

  public function redirectAfterLogin(RequestEvent $event) {

    // Only main request
    if (method_exists($event, 'isMainRequest')) {
      if (!$event->isMainRequest()) return;
    }

    $request = $event->getRequest();

    // Trigger ONLY when coming from login (custom param)
    if ($request->query->get('check_logged_in') != 1) {
      return;
    }

    if (!$this->currentUser->isAuthenticated()) {
      return;
    }

    // Load FULL User entity (AccountProxy cannot read taxonomy fields)
    $user = User::load($this->currentUser->id());

    if (!$user) {
      return;
    }

    // Get company term ID
    $company_tid = $user->get('field_company')->target_id ?? NULL;
    // print_r($company_tid);


    // Save company in session (to be read in controllers)
    \Drupal::service('tempstore.private')
      ->get('custom_redirect')
      ->set('user_company_tid', $company_tid);

    // Map role → dashboard route
    $role_map = [
      'editor'      => 'custom_redirect.editor_dashboard',
      'typesetter'  => 'custom_redirect.typesetter_dashboard',
      'author'      => 'custom_redirect.author_dashboard',
      'master_copier'  => 'custom_redirect.mastercopy_dashboard',
    ];

    // Find matching role
    foreach ($this->currentUser->getRoles() as $role) {
      if (isset($role_map[$role])) {

        // Redirect to the correct dashboard
        $url = Url::fromRoute($role_map[$role])->toString();
        $event->setResponse(new RedirectResponse($url));
        return;
      }
    }
  }
}
