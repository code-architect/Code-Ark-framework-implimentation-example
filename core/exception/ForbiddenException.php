<?php


namespace app\core\exception;

/**
 * @author: Indranil Samanta (code-architec)
 * Class ForbiddenException
 * @package app\core\exception
 */
class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = "You don't have permission to access this page";
}