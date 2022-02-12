<?php

/* Class AuthController
 *
 * @author: Indranil Samanta (code-architect)
* @package app\core
*/
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }


    public function register(Request $request)
    {
        $user = new User();
        if($request->isPost())
        {
            // First Load data then call validate
            // Todo 1
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()){
                return "Success";
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }
}