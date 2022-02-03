<?php

namespace Drupal\module_hero\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Our events subscriber.
 */

 class HeroInitSubscriber implements EventSubscriberInterface {
     public function __construct()
     {
         
     }

     public function onRequest(){
         var_dump('Hello from our event'); die();
     }

     public static function getSubscribedEvents()
     {
         $events[KernalEvents::REQUEST][] = ['onRequest'];
         return $events;
     }
 }