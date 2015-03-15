<?php
namespace app\controllers;

use app\core\classes\Controller;
use app\models\IndexModel;

class IndexController extends Controller {

    public function actionIndex() {
        $sql = new IndexModel();
        list($all_project,$all_task) = $sql->getAllProject();
        return $this->renderView('index', array('all_project' => $all_project, 'all_task' => $all_task));
    }

    public function actionPriority() {
        $sql = new IndexModel();
        $sql->updatePriority();
        echo json_encode(1);
    }

    public function actionDeleteTask() {
        $sql = new IndexModel();
        $sql->deleteTask();
        echo json_encode(1);
    }

    public function actionDeleteTaskProject() {
        $sql = new IndexModel();
        $sql->deleteTaskProject();
        echo json_encode(1);
    }

    public function actionUpdateTask() {
        $sql = new IndexModel();
        $sql->updateTask();
        echo json_encode(1);
    }

    public function actionAddTask() {
        $sql = new IndexModel();
        $result = $sql->addTask();
        echo json_encode($result);
    }

    public function actionSaveProject() {
        $sql = new IndexModel();
        $id = $sql->saveProject();
        echo json_encode($id);
    }

    public function actionAddStatusTask() {
        $sql = new IndexModel();
        $sql->addStatusTask();
        echo json_encode(1);
    }

}