<?php
/**
 * Created by PhpStorm.
 * User: palad
 * Date: 15.10.2017
 * Time: 18:35
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function getCommentsByTask(int $id_task) {
        $comments = Comment::where('id_task','=', $id_task)
            ->orderBy('date', 'desc')
            ->get()->toArray();

        return $comments;
    }

    public function getCommentsByIdea(int $id_idea) {
        $comments = Comment::where('id_idea','=', $id_idea)
            ->orderBy('date', 'desc')
            ->get()->toArray();

        return $comments;
    }
}