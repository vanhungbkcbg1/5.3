<?php
/**
 * Created by PhpStorm.
 * User: vanhu
 * Date: 9/9/2017
 * Time: 10:05 AM
 */

namespace App\Repository;


use App\Model\Post;

class PostRepository extends BaseRepository
{

    public function model()
    {
        // TODO: Implement model() method.
        return Post::class;
    }
}