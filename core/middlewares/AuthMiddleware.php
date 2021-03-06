<?php


namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

/**
 * @author: Indranil Samanta (code-architec)
 * Class AuthMiddleware
 * @package app\core\middlewares
 */
class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if(Application::$app::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions))
            {
                throw new ForbiddenException();
            }
        }
    }
}