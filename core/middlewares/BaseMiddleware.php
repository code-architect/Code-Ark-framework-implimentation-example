<?php


namespace app\core\middlewares;

/**
 * @author: Indranil Samanta (code-architec)
 * Class BaseMiddleware
 * @package app\core\middlewares
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}