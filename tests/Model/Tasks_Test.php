<?php

namespace Tests\Models;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Utils\Utils;
use App\Models\Tasklist;
use Dflydev\DotAccessData\Util;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Tasks_Test extends TestCase {

    use RefreshDatabase;

    public function test_addTask() {
        $list = Tasklist::createList('Lista de prueba', '#FFFFFF');

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $savedTask = Task::find($task->id);

        // Comprobamos que los datos de la tarea guardada son correctos
        $this->assertEquals($task->list_id, $savedTask->list_id);
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

        // Comprobamos que la tarea ha sido marcada como completada
        $this->assertTrue($checkedTask->checked);
    }

    public function test_uncheck() {
        $name = 'Lista de prueba';

        $list = Tasklist::createList($name, '#b12525');

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $testTask = Task::check($task->id);

        // Comprobamos que la tarea ha sido marcada como completada
        $this->assertTrue($testTask->checked);

        $testTask = Task::uncheck($task->id);

        // Comprobamos que la tarea ha sido marcada ahora como no completada
        $this->assertFalse($testTask->checked);
    }


    public function test_updateTask() {
        $name = 'Lista de prueba';

        $list = Tasklist::createList($name);

        $task = Task::addTask(
            $list->id,
            'Tarea de prueba',
            'Descripción de tarea de prueba'
        );

        $newTitle = 'Tarea de prueba actualizada';
        $newDescription = 'Descripción de tarea de prueba actualizada';
        $newDueDate = Carbon::now()->addDays(5);
        $newReminderDate = Carbon::now()->addDays(3);

        $updatedTask = Task::updateTask(
            $task->id,
            $newTitle,
            $newDescription,
            $newDueDate,
            $newReminderDate
        );

        // Comprobamos que los datos de la tarea se han actualizado
        $this->assertEquals($newTitle, $updatedTask->title);
        $this->assertEquals($newDescription, $updatedTask->description);
        $this->assertEquals($newDueDate, $updatedTask->due_date);
        $this->assertEquals($newReminderDate, $updatedTask->reminder_date);

        $correctedDescription = 'Descripción de tarea de prueba corregida';

        $updatedTask2 = Task::updateTask(
            $task->id,
            description: $correctedDescription
        );

        // Comprobamos que solo se han actualizado los datos proporcionados mantiendo los otros datos como estaban.
        $this->assertEquals($newTitle, $updatedTask2->title);
        $this->assertEquals($correctedDescription, $updatedTask2->description);
    }
}
