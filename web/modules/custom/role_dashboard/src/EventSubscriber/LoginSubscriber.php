<?php

namespace Drupal\role_dashboard\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\EventSubscriber\UserLoginSubscriberBase;
use Drupal\user\Event\UserLoginEvent;
use Drupal\user\UserEvents;
use Drupal\Core\Url;

class LoginSubscriber implements EventSubscriberInterface {

  public static function getSubscribedEvents() {
    return [
      SecurityEvents::INTERACTIVE_LOGIN => 'onUserLogin',
    ];
  }

  public function onUserLogin(InteractiveLoginEvent $event) {

    $user = $event->getAuthenticationToken()->getUser();

    /** @var \Drupal\user\Entity\User $user */

    if ($user instanceof AccountInterface) {
      // ROLE-WISE REDIRECT
      if ($user->hasRole('administrator')) {
        $response = new TrustedRedirectResponse(Url::fromRoute('system.admin_content')->toString());
      }
      elseif ($user->hasRole('editor')) {
        $response = new TrustedRedirectResponse(Url::fromRoute('node.add_page')->toString());
      }
      elseif ($user->hasRole('typesetter')) {
        $response = new TrustedRedirectResponse('/dashboard/typesetter');
      }
      else {
        $response = new TrustedRedirectResponse('/user');
      }

      $event->getRequest()->getSession()->set('redirect_response', $response);
    }
  }
}
