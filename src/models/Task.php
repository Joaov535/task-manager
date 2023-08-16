<?php

namespace src\models;

use \core\Model;
use Exception;

class Task extends Model
{

    public static function getTasks($userId): array
    {
        $arrTasks = array();
        $id = $userId;

        $arrTasks = Task::select(['task_name', 'task_info', 'task_schedule'])
        ->where('user', $id)
        ->get();

        return $arrTasks;
    }

    public static function sendTask(array $task): array
    {
        $sendTask = array();

        Task::insert([
            'user' => $task['userId'],
            'task_name' => $task['taskName'],
            'task_info' => $task['taskInfo'],
            'task_schedule' => $task['taskSchedule']

        ])->execute();

        $sendTask['status'] = 'Tarefa cadastrada';


        return $sendTask;
    }

    public static function getTask($task): array
    {
        $arrTasks = array();
        

        $arrTasks = Task::select(['task_name', 'task_info', 'task_schedule'])
            ->where('task_name', $task['name'])
            ->where('task_info', $task['info'])
            ->where('task_schedule', $task['schedule'])
            ->get();

        return $arrTasks;
    }
}
