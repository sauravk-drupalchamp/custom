<?php

namespace Drupal\module_hero\ControllerServices;

use Drupal\Core\Controller\ControllerBase;
use Drupal\devel\Plugin\Devel\Dumper\Kint;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\module_hero\ArticleHeroServices;

/**
 * This is our hero controller services.
 */

class HeroControllerServices extends ControllerBase {

    private $articleHeroServices;

    public static function create(ContainerInterface $container){
        return new static(
            $container->get('module_hero.hero_articles')
        );
    }

    public function __construct(ArticleHeroServices $articleHeroServices)
    {
        $this->articleHeroServices = $articleHeroServices;
    }

  public function heroServices() {

    kint($this->articleHeroServices->getHeroArticle()); die();
    
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
        '#type' => 'markup',
        '#markup' => $this->t('Our wonderful heroes list'),
      ];

  }
}
