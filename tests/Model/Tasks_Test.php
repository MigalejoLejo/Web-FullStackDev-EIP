<?php

namespace Tests\Models;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Utils\Utils;
use App\Models\Tasklist;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Tasks_Test extends TestCase {

    use RefreshDatabase;

    public function test_addTask() {
        $name = 'Lista de prueba';
        $color = '#FFFFFF';

        $list = Tasklist::createList($name, $color);

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $savedTask = Task::find($task->id);
        $this->assertEquals($task->id, $savedTask->id);

    }

    public function test_check() {
        $name = 'Lista de prueba';

        $list = Tasklist::createList($name);

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $checkedTask = Task::check($task->id);

        $this->assertTrue($checkedTask->checked);
    }

    public function test_uncheck() {
        $name = 'Lista de prueba';

        $list = Tasklist::createList($name);

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $checkedTask = Task::check($task->id);
        $uncheckedTask = Task::uncheck($task->id);

        $this->assertFalse($uncheckedTask->checked);
    }


}
