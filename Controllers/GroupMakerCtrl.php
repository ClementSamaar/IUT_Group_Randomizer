<?php

class GroupMakerCtrl
{
    private GroupList $_groupList;

    public function defaultAction() : void {
        $view = new View(null);
        $view->display('app/form.php');
    }

    public function displayFormAction() : void {
        $this->defaultAction();
    }

    public function makeGroupsAction() : void {
        try {
            $fileType = strtolower(pathinfo($_FILES['sourceFile']['name'], PATHINFO_EXTENSION));
            if ($fileType != "json") throw new Exception('The file uploaded is not a JSON file');
            $classroom = new Classroom($id ?? null, $name ?? null, $_FILES['sourceFile']['tmp_name']);
            $this->_groupList = new GroupList(1, $_POST['groupName']);
            $this->_groupList->computeStudentPerGroup($classroom->getClassroomSize(), $_POST['studPerGroup']);
            $this->_groupList->makeGroupList($classroom->getClassroomSize(), $classroom->getStudentList());
            $this->showGroups();
        }
        catch (JsonException|Exception $e){
            $view = new View(array('jsonError'=>$e->getMessage()));
            $view->display('app/form.php');
        }
    }

    private function showGroups() : void {
        $view = new View(array('groupList'=>$this->_groupList));
        $view->display('app/groups.php');
    }
}