<?php

namespace src\models;

use \core\Model;
use Exception;

class Task extends Model
{

    public static function getTask($userId): array
    {
        $arrTasks = array();
        $id = $userId;

        $arrTasks = Task::select(['task_name', 'task_info', 'task_schedule'])->where('user', $id)->execute();

        return $arrTasks;
    }

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

            $sendTask['status'] = 'Erro: '.$e;
        }

        return $sendTask;
    }
}
