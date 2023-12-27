<?php

class Gallery_model extends Database
{
    public function getAll()
    {
        $sql = 'SELECT * FROM galleries';
        $this->query($sql);
        return $this->multipleSet();
    }
}