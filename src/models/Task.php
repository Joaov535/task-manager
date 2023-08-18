<?php

namespace src\models;

use ClanCats\Hydrahon\Query\Sql\Exception as SqlException;
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

    public static function getTaskById($id): array
    {

        $arrTask = Task::select(['id','task_name', 'task_info', 'task_schedule'])
            ->where('id', $id)
            ->get();

        return $arrTask;
    }

    public static function sendTask(array $task): string
    {

        try {
            Task::insert([
                'user' => $task['userId'],
                'task_name' => $task['taskName'],
                'task_info' => $task['taskInfo'],
                'task_schedule' => $task['taskSchedule']

            ])->execute();

            $status = 'Tarefa cadastrada';
        } catch (Exception $e) {
            $status = 'ERRO: ' . $e;
        }

        return $status;
    }

    public static function updateTask(array $task): string
    {

        try {
            Task::update()
                ->set('task_name', $task['task_name'])
                ->set('task_info', $task['task_info'])
                ->set('task_schedule', $task['task_schedule'])
                ->where('id', $task['id'])
                ->execute();

            $status = 'Tarefa atualizada com sucesso!';
        } catch (SqlException $e) {
            $status = 'ERRO: ' . $e;
        }

        return $status;
    }
}
