<?php

/* Class AuthController
 *
 * @author: Indranil Samanta (code-architect)
* @package app\core
*/
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if($request->isPost())
        {
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                 Application::$app->redirect('/');
                 return;
            }
        }

        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
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
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->redirect('/');
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