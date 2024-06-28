<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Tasklists;
use App\Utils\K;

class Tasklist extends Model {
    use HasFactory;

    protected $table = 'tasklists';

    public static function createList(
        $name,
        $color = K::DEFAULT_LIST_COLOR
    ) {
        $list = new Tasklist();
        $list->name = $name;
        $list->color = $color;
        $list->save();

        return $list;
    }

    public static function createUserList($user_id, $name, $color = K::DEFAULT_LIST_COLOR) {
        $list = Tasklist::createList($name, $color);
        Users_Tasklists::createRelation($list->id, $user_id);

        return $list;
    }

    public static function getUserLists($user_id) {
        $relations = Users_Tasklists::where('user_id', $user_id)->get();
        $lists = [];

        foreach ($relations as $relation) {
            $list = Tasklist::find($relation->list_id);
            array_push($lists, $list);
        }

        return $lists;
    }

    public static function getListUsers($list_id) {
        $relations = Users_Tasklists::where('list_id', $list_id)->get();
        $users = [];

        foreach ($relations as $relation) {
            $user = User::find($relation->user_id);
            array_push($users, $user);
        }

        return $users;
    }

    public static function shareList ($list_id, ...$user_ids) {
        foreach ($user_ids as $id) {
            Users_Tasklists::createRelation($list_id, $id);
        }
    }

    public static function getListById($id) {
        return Tasklist::find($id);
    }

    public static function updateList($id, $name, $color) {
        $list = static::getListById($id);

        if (isset($list)) {
            $list->name = $name ?? $list->name;
            $list->color = $color ?? $list->color;

            $list->save();

            return $list;
        } else {
            return "No se encontró la lista con id [$id].";
        }
    }


    public static function deleteListById($id) {
        $list = static::getListById($id);

        if (isset($list)) {
            $list->delete();
            return "Lista con id [$id] eliminada.";
        } else {
            return "No se encontró la lista con id [$id].";
        }
    }
}
