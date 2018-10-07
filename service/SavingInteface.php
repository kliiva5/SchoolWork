<?php
/**
 * Created by PhpStorm.
 * User: kristjanl
 * Date: 07.10.2018
 * Time: 13:04
 */

interface SavingInteface
{
    public function empty();
    public function save($code, $lat, $lang);
    public function read($code);
}