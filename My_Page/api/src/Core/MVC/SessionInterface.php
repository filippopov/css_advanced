<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 9.2.2019 г.
 * Time: 20:22
 */

namespace Philip\Popov\Core\MVC;


interface SessionInterface
{
    public function get($key);

    public function set($key, $value);

    public function remove($key);

    public function exists($key) : bool;

    public function destroy();
}