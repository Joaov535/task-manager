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

        $arrTasks = Task::select(['id', 'task_name', 'task_info', 'task_schedule'])
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

    public static function getTaskById($id): array
    {

        $arrTask = Task::select(['task_name', 'task_info', 'task_schedule'])
            ->where('id', $id)
            ->get();

        return $arrTask;
    }
}
