<?php

namespace Drupal\module_hero\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactory;

/**
 * This is our hero controller.
 */
class HeroController extends ControllerBase {

  protected $configFactory;

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  public function __construct( ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }

  public function heroList() {

    $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Luke Cage'],
      ['name' => 'Black Widow'],
      ['name' => 'Daredevil'],
      ['name' => 'Captain America'],
      ['name' => 'Wolverine']
    ];

    return [
      '#theme' => 'hero_list',
      '#items' => $heroes,
      '#title' => $this->configFactory->get('module_hero.settings')->get('hero_list_title'),
    ];

  }
}
