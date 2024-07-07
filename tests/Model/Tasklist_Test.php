<?php

namespace Tests\Models;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Utils\Utils;
use App\Models\Tasklist;
use App\Models\Users_Tasklists;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Tasklist_Test extends TestCase {

    use RefreshDatabase;

    public function test_createUserList() {
        $user = new User();
        $user->name = 'Test';
        $user->email = '';
        $user->password = '';
        $user->email_verified_at = Carbon::now();
        $user->save();


        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list = Tasklist::createUserList($user->id, $name, $color);

        // comprobamos que la lista se ha creado correctamente
        $this->assertEquals($name, $list->name);
        $this->assertEquals($color, $list->color);

        $relations = Users_Tasklists::getRelationByListId($list->id);

        // comprobamos que se ha creado la relación entre el usuario y la lista
        $this->assertEquals(1, count($relations));
        $this->assertEquals($user->id, $relations[0]->user_id);

    }

    public function test_getListById() {
        $user_id = 1;
        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list = Tasklist::createList($name, $color);

        $list1 = Tasklist::getListById($list->id);

        // comprobamos que la lista se ha recuperado correctamente por su id
        $this->assertEquals($list1->id, $list->id);
    }

    public function test_getUserLists() {
        $user = new User();
        $user->name = 'Test';
        $user->email = '';
        $user->password = '';
        $user->email_verified_at = Carbon::now();
        $user->save();


        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list1 = Tasklist::createUserList($user->id, $name, $color);
        $list2 = Tasklist::createUserList($user->id, $name, $color);
        $list3 = Tasklist::createUserList($user->id, $name, $color);

        $lists = Tasklist::getUserLists($user->id);
        $savedList = Tasklist::find($list3->id);

        // comprobamos que se han recuperado las listas del usuario
        $this->assertEquals(3, count($lists));
        $this->assertEquals($list3->id, $savedList->id);
    }

    public function test_sharing() {
        $userA = new User();
        $userA->name = 'User A';
        $userA->email = 'a';
        $userA->password = '';
        $userA->email_verified_at = Carbon::now();
        $userA->save();

        $userB = new User();
        $userB->name = 'User B';
        $userB->email = 'b';
        $userB->password = '';
        $userB->email_verified_at = Carbon::now();
        $userB->save();

        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list = Tasklist::createUserList($userA->id, $name, $color);

        Tasklist::shareList($list->id, $userB->id);

        $listsA = Tasklist::getUserLists($userA->id);
        $listsB = Tasklist::getUserLists($userB->id);

        $users = Tasklist::getListUsers($list->id);
        $userIds = array_column($users, 'id');

        // comprobamos que la lista se ha compartido correctamente viendo si ambos usuarios tienen acceso a ella
        $this->assertTrue(in_array($userA->id, $userIds));
        $this->assertTrue(in_array($userB->id, $userIds));

        // comprobamos que se ha compartido correctamente viendo si las listas de los dos usuarios son iguales
        $this->assertEquals($listsA, $listsB);
    }
}
