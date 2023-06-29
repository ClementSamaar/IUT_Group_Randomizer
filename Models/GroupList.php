<?php

class GroupList
{
    private int $_id;
    private ?string $_name;
    private array $_studPerGroup;
    private array $_groupList;

    public function __construct(int $id, ?string $name){
        $this->_id = $id;
        $this->_name = $name ?? 'GroupList n°' . $id;
    }

    public function getId(): int {
        return $this->_id;
    }

    public function getName(): string {
        return $this->_name;
    }

    public function getStudPerGroup(): array
    {
        return $this->_studPerGroup;
    }

    public function getList(): array
    {
        return $this->_groupList;
    }

    /**
     * @desc Create an array containing the correct number of groups to make filled with the maximum amount of students
     * @param int $classSize
     * @param int $limitPerGroup
     * @return void
     */
    private function computeFilledGroups(int $classSize, int $limitPerGroup) : void {
        $quo = intdiv($classSize, $limitPerGroup);
        $mod = $classSize%$limitPerGroup;
        $cpt = 0;
        for ($i = 0; $i < $quo + 1; ++$i){
            if ($cpt > $classSize - $limitPerGroup) $this->_studPerGroup[$i] = $mod;
            else $this->_studPerGroup[$i] = $limitPerGroup;
            $cpt += $limitPerGroup;
        }
    }

    /**
     * @desc Equalize the array created by the 'computeFilledGroups' method to make fair groups
     * @param int $classSize
     * @param int $limitPerGroup
     * @return void
     * @uses GroupList::computeFilledGroups()
     */
    public function computeStudentPerGroup(int $classSize, int $limitPerGroup) : void {
        $this->computeFilledGroups($classSize, $limitPerGroup);
        $cpt = 0;
        $lastValue = null;
        while ($cpt < sizeof($this->_studPerGroup)){
            for ($i = 0; $i < sizeof($this->_studPerGroup); ++$i){
                if (!isset($lastValue)) $lastValue = $this->_studPerGroup[$i];
                else{
                    if ($this->_studPerGroup[$i] + 1 < $lastValue){
                        --$this->_studPerGroup[$i-1];
                        ++$this->_studPerGroup[$i];
                        $cpt = 0;
                    }
                    else ++$cpt;
                }
                $lastValue = $this->_studPerGroup[$i];
            }
        }
    }

    /**
     * @desc This function randomly assigns the right number of student in each group
     * @param int $classroomSize
     * @param array $studentList
     * @return void
     * @uses GroupList::makeRandomIntArray()
     */
    public function makeGroupList(int $classroomSize, array $studentList){
        $randIntArray = $this->makeRandomIntArray($classroomSize - 1);
        $groupList = [];
        for ($i = 0; $i < sizeof($this->_studPerGroup); ++$i){
            $group = [];
            for ($j = 0; $j < $this->_studPerGroup[$i]; ++$j){
                $group[] = $studentList[$randIntArray[0]];
                array_shift($randIntArray);
            }
            $groupList[] = new Group($i + 1, $group);
        }
        $this->_groupList = $groupList;
    }

    private function makeRandomIntArray(int $max) : array {
        $randArray = range(0, $max);
        shuffle($randArray);
        return $randArray;
    }
}