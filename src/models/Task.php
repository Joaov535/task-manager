<?php

namespace src\models;

use \core\Model;
use Exception;

class Task extends Model
{

    public static function sendTask(array $task): array
    {
        $sendTask = array();

        try {

            Task::insert([
                'user' => $task['userId'],
                'task_name' => $task['taskName'],
                'task_info' => $task['taskInfo'],
                'task_schedule' => $task['taskSchedule']

            ])
                ->execute();

            $sendTask['status'] = 'Tarefa cadastrada';
        } catch (Exception $e) {

            $sendTask['status'] = $e;
        }

        return $sendTask;
    }
}
