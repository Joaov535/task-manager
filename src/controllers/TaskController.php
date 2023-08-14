<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Task;

class TaskController extends Controller
{

    public function tasks()
    {
        if (!empty($_SESSION['UserLogged'])) {
            $arrTasks = Task::getTask($_SESSION['UserLogged']['id']);
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

            $statusSend = Task::sendTask($task);
            $_SESSION['sendTask'] = $statusSend['status'];
            $this->redirect('/makeTask');
        }

        $_SESSION['sendTask'] = 'faltam dados';
        $this->redirect('/makeTask');
    }
}
