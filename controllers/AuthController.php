<?php

/* Class AuthController
 *
 * @author: Indranil Samanta (code-architect)
* @package app\core
*/
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }


    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if($request->isPost())
        {
            // First Load data then call validate
            // Todo 1
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()){
                return "Success";
            }
            
            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}