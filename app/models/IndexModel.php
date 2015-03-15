<?php
namespace app\models;
use app\core\classes\ActiveRecord;
use app\core\classes\PdoException;

Class IndexModel extends ActiveRecord {

    public function getAllProject() {
        $data = array();
        $data_task = array();
        $sql = $this->getPdoConn()->prepare('SELECT name_project.id,name_project.name,task_list.description,task_list.task_id,task_list.id as id_task,task_list.status FROM name_project
                               LEFT JOIN task_list ON name_project.id=task_list.task_id ORDER BY id DESC');
        $sql->execute() or PDOException::invalidClaim();
        $i=0;
        foreach ($sql->fetchAll() as $value) {
            $data[$value['id']] = $value;
            $data_task[$i][$value['task_id']]['descr'] = $value['description'];
            $data_task[$i][$value['task_id']]['id_task'] = $value['id_task'];
            $data_task[$i][$value['task_id']]['status'] = $value['status'];
            $i++;
        }
        return array($data,$data_task);
    }

    public function updatePriority() {
        $id_first = $_POST['id_first'];
        $id_second = $_POST['id_second'];
        $addition_id = '1111111';

        $this->getPdoConn()->prepare('UPDATE task_list SET id=:addition WHERE id=:id_first')->execute(array('id_first' => $id_first, 'addition' => $addition_id)) or PDOException::invalidClaim();
        $this->getPdoConn()->prepare('UPDATE task_list SET id=:id_first WHERE id=:id_second')->execute(array('id_second' => $id_second, 'id_first' => $id_first)) or PDOException::invalidClaim();
        $this->getPdoConn()->prepare('UPDATE task_list SET id=:id_second WHERE id=:addition')->execute(array('id_second' => $id_second, 'addition' => $addition_id)) or PDOException::invalidClaim();
    }

    public function deleteTask() {
        $id_task = $_POST['id_task'];

        $this->getPdoConn()->prepare('DELETE FROM task_list WHERE id=:id')->execute(array('id' => $id_task)) or PDOException::invalidClaim();
    }

    public function deleteTaskProject() {
        $id_project = $_POST['id_project'];

        $this->getPdoConn()->prepare('DELETE FROM name_project WHERE id=:id')->execute(array('id' => $id_project)) or PDOException::invalidClaim();
    }

    public function updateTask() {
        $id_task = $_POST['id_task'];
        $descr = $_POST['descr'];
        $type = $_POST['type'];
        if ($type == 1) {
            $this->getPdoConn()->prepare('UPDATE name_project SET name=:descr WHERE id=:id')->execute(array('descr' => $descr, 'id' => $id_task)) or PDOException::invalidClaim();
        } else {
            $this->getPdoConn()->prepare('UPDATE task_list SET description=:descr WHERE id=:id')->execute(array('descr' => $descr, 'id' => $id_task)) or PDOException::invalidClaim();
        }
    }

    public function addTask() {
        $id_task = $_POST['number_project'];
        $description = $_POST['descr'];
        $this->getPdoConn()->prepare('INSERT INTO task_list(task_id, description) VALUES(:task_id, :description)')->execute(array('task_id' => $id_task, 'description' => $description)) or PDOException::invalidClaim();
        $sql_id_task = $this->getPdoConn()->prepare('SELECT id,description FROM task_list WHERE task_id=:task_id AND description=:description');
        $sql_id_task->execute(array('task_id' => $id_task, 'description' => $description)) or PDOException::invalidClaim();
        $result = $sql_id_task->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function saveProject() {
        $post_name = $_POST['name_php'];
        $this->getPdoConn()->prepare('INSERT INTO name_project(name) VALUES(:name)')->execute(array('name' => $post_name)) or PDOException::invalidClaim();
        return $this->getPdoConn()->lastInsertId();
    }

    public function addStatusTask() {
        $id_task = $_POST['id_task'];
        switch($_POST['type']) {
            case 0: $this->getPdoConn()->prepare('UPDATE task_list SET status=0 WHERE id=:id')->execute(array('id' => $id_task)) or PDOException::invalidClaim();break;
            case 1: $this->getPdoConn()->prepare('UPDATE task_list SET status=1 WHERE id=:id')->execute(array('id' => $id_task)) or PDOException::invalidClaim();break;
        }
    }

}