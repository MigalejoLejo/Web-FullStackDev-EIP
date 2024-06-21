<?php

namespace Tests\Models;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use App\Utils\Utils;
use App\Models\Tasklist;
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

        Utils::log($list);
        $this->assertEquals($name, $list->name);
        $this->assertEquals($color, $list->color);
    }

    public function test_getListById() {
        $user_id = 1;
        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list = Tasklist::createList($name, $color);

        $list1 = Tasklist::getListById($list->id);
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

        // Utils::log($lists);
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
        $this->assertTrue(in_array($userA->id, $userIds));
        $this->assertTrue(in_array($userB->id, $userIds));

        $this->assertEquals($listsA, $listsB);
    }
}
