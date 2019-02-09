<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 9.2.2019 г.
 * Time: 19:32
 */

namespace Philip\Popov\Core\MVC;


interface MVCContextInterface
{
    public function getController() : string;

    public function getAction() : string;

    public function getUriJunk() : string;

    public function getArguments() : array;

    public function getGetParams() : array;

    public function getOneGetParam(string $key) : string;
}