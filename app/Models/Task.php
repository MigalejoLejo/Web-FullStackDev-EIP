<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    use HasFactory;

    protected $table = 'tasks';

    public static function addTask(
        $list_id,
        $title,
        $description,
        $due_date = null,
        $reminder_date = null,
        $asigneeId = null
    ) {
        $task = new Task();
        $task->list_id = $list_id;
        $task->title = $title;
        $task->description = $description;
        $task->due_date = $due_date;
        $task->reminder_date = $reminder_date;
        $task->asignee_id = $asigneeId;
        $task->save();

        return $task;
    }

    public static function check($taskId) {
        $task = Task::find($taskId);
        $task->checked = true;
        $task->save();
        return $task;
    }

    public static function uncheck($taskId) {
        $task = Task::find($taskId);
        $task->checked = false;
        $task->save();
        return $task;
    }

    public static function updateTask($taskId, $title, $description, $due_date, $reminder_date) {
        $task = Task::find($taskId);
        $task->title = $title;
        $task->description = $description;
        $task->due_date = $due_date;
        $task->reminder_date = $reminder_date;
        $task->save();
        return $task;
    }
}
