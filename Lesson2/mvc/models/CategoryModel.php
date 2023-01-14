<?php

class CategoryModel extends Connection
{
    public function getAll()
    {
        $query = "SELECT * FROM Categories";
        return $this->mysqli->query($query);
    }
}