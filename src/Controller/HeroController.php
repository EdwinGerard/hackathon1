<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 06/04/18
 * Time: 07:51
 */

namespace Controller;

use Model\Hero;
use Model\HeroManager;

class HeroController extends AbstractController
{
    /**
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function afficheHero()
    {
        $heroManager = new HeroManager();
        $heros = $heroManager->getHeroFromApi();
    }

}