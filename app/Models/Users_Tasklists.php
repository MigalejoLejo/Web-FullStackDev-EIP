<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_Tasklists extends Model
{
    use HasFactory;

    protected $table = 'users_tasklists';

    public static function createRelation($list_id, $user_id) {
        $relation = new Users_Tasklists();
        $relation->list_id = $list_id;
        $relation->user_id = $user_id;
        $relation->save();

        return $relation;
    }


}
