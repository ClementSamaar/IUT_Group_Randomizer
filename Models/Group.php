<?php

class Group
{
    private int $_id;
    private array $_list;

    public function __construct(int $id, array $list) {
        $this->_id = $id;
        $this->_list = $list;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function getList(): array
    {
        return $this->_list;
    }


}