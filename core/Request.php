<?php


namespace app\core;

/**
 * Class Request
 * @author: Indranil Samanta (code-architec)
 * @package app\core
 */
class Request
{
    /**
     * Get the current requested url [e.g: if the url is https://xys.com/user?id=12, this will return /user]
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false)
        {
            return $path;
        }
        return $path = substr($path, 0, $position);
    }

    /**
     * Get the requested method in $_SERVER super global
     * @return string
     */
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}