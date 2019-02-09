<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 9.2.2019 г.
 * Time: 20:22
 */

namespace Philip\Popov\Core\MVC;


class Session implements SessionInterface
{
    private $data = [];

    public function __construct(&$data)
    {
        $this->data = &$data;
    }

    public function get($key)
    {
        return $this->data[$key];
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function remove($key)
    {
        unset($this->data[$key]);
    }

    public function exists($key) : bool
    {
        return array_key_exists($key, $this->data);
    }

    public function destroy()
    {
        unset($this->data);
        session_destroy();
    }
}