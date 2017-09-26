<?php
namespace App\Repository;
/**
 * Created by PhpStorm.
 * User: vanhu
 * Date: 9/9/2017
 * Time: 9:57 AM
 */
interface IRepository
{
    public function getAll();
    public function find($id);

}