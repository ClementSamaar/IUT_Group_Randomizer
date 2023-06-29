<?php

class Student
{
    private int $_id;
    private string $_lName;
    private string $_fName;

    public function __construct(int $id, string $fName, string $lName){
        $this->_id = $id;
        $this->_lName = $lName;
        $this->_fName = $fName;
    }

    public function getId(): int {
        return $this->_id;
    }

    public function getFName(): string {
        return $this->_fName;
    }

    public function getLName(): string {
        return $this->_lName;
    }


}