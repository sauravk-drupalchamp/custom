<?php

namespace Drupal\module_hero;

use Drupal\Core\Entity\Query\QueryInterface;
use Drupal\Core\Entity\EntityTypeManager;

/*
*
**This is a service for Article Heros.
*/
class ArticleHeroServices {

    private $entityQuery;
    private $enitityManager;

    public function __construct( QueryInterface $entityQuery, EntityTypeManager $enitityManager )
    {
        $this->entityQuery = $entityQuery;
        $this->enitityManager = $enitityManager;
    }

    public function getHeroArticle(){
        // $hero_article = ['Hulk is green and strong!', 'Flash is lighting fast!'];

        $articleNids = $this->entityQuery->get('node')->condition('type', 'article')->execute();

        // return $hero_article;
        return $this->enitityManager->getStorage('node')->loadMultiple($articleNids);
    }
}