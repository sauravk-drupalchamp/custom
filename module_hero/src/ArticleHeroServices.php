<?php

namespace Drupal\module_hero;

/*
*
**This is a service for Article Heros.
*/
class ArticleHeroServices {
    public function getHeroArticle(){
        $hero_article = ['Hulk is green and strong!', 'Flash is lighting fast!'];
        return $hero_article;
    }
}