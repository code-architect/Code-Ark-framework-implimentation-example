<?php


namespace app\controllers;

use app\core\Application;
use app\core\Controller;

/**
 * Class SiteController
 *
 * @author: Indranil Samanta (code-architec)
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Code-Architect'
        ];
        return $this->render('home', $params);
    }

    public function handleContact()
    {
        return $this->render('contact');
    }

    public function contact()
    {
        print_r($_POST);
        return "handling submitted data from contact method";
    }
}