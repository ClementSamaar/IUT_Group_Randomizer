<?php

class Classroom
{
    private ?int $_id;
    private ?string $_name;
    private array $_studentList;

    /**
     * @throws JsonException
     * @throws Exception
     */
    public function __construct(?int $id, ?string $name, string $fileName){
        $this->_id = $id ?? null;
        $this->_name = $name ?? null;
        $stdObjClassList = json_decode(file_get_contents($fileName), null, 512, JSON_THROW_ON_ERROR);
        for ($i = 0; $i < sizeof($stdObjClassList); ++$i){
            $this->_studentList[$i] = $this->parseStudent($stdObjClassList[$i], $i);
        }
    }

    public function getId(): int {
        return $this->_id;
    }

    public function getName(): ?string {
        return $this->_name;
    }

    public function getStudentList(): array {
        return $this->_studentList;
    }

    public function getClassroomSize(): int {
        return count($this->_studentList);
    }

    /**
     * @desc Assuming that the JSON file is correct, this function converts a stdClassObject into a Student object
     * @param object $studData
     * @param int $index
     * @return Student
     * @throws Exception
     */
    private function parseStudent(object $studData, int $index) : Student {
        if (!property_exists($studData, 'Nom')) throw new Exception('JSON file : Key \'Nom\' expected at line ' . ($index + 1));
        else if (!property_exists($studData, 'Prénom')) throw new Exception('JSON file : Key \'Prénom\' expected at object ' . ($index + 1));
        else return new Student($index, $studData->{'Nom'}, $studData->{'Prénom'});
    }
}