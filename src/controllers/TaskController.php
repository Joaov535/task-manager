<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Task;

class TaskController extends Controller
{

    public function tasks()
    {
        if (!empty($_SESSION['UserLogged'])) {
            $arrTasks = Task::getTasks($_SESSION['UserLogged']['id']);
            $this->render('tasks', [
                'tasks' => $arrTasks
            ]);
        } else {
            $this->redirect('/');
        }
    }

    public function makeTask()
    {
        $this->render('makeTask');
    }

    public function addTask()
    {
        $task['userId'] = $_SESSION['UserLogged']['id'];
        $task['taskName'] = filter_input(INPUT_POST, 'nameTask', FILTER_SANITIZE_SPECIAL_CHARS);
        $task['taskInfo'] = filter_input(INPUT_POST, 'infoTask', FILTER_SANITIZE_SPECIAL_CHARS);
        $task['taskSchedule'] = filter_input(INPUT_POST, 'date');

        if (!empty($task['userId']) && !empty($task['taskName']) && !empty($task['taskInfo']) && !empty($task['taskSchedule'])) {

            $taskSend = Task::sendTask($task);
            if ($taskSend == 'Tarefa cadastrada') {
                $_SESSION['sendTask'] = $taskSend;
                $this->redirect('/makeTask');
            }
            $_SESSION['sendTask'] = 'Erro:' . $taskSend;
                $this->redirect('/makeTask');
        }

        $_SESSION['sendTask'] = 'faltam dados';
        $this->redirect('/makeTask');
    }

    public function editTask()
    {

        $id = $_GET['id'];

        $task = Task::getTaskById($id);

        $this->render('editTask', [
            'task' => $task[0]
        ]);
    }

    public function editTaskAction()
    {
        $arrTasks['id'] = filter_input(INPUT_POST, 'id');
        $arrTasks['task_name'] = filter_input(INPUT_POST, 'nameTask', FILTER_SANITIZE_SPECIAL_CHARS);
        $arrTasks['task_info'] = filter_input(INPUT_POST, 'infoTask', FILTER_SANITIZE_SPECIAL_CHARS);
        $arrTasks['task_schedule'] = filter_input(INPUT_POST, 'date');

        // $this->render('teste', [
        //     'teste' => $arrTasks
        // ]);

        $status = Task::updateTask($arrTasks);

        $_SESSION['statusUpdateTask'] = $status;

        $this->redirect('/editTask');
    }
}
