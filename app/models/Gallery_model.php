<?php

class Gallery_model extends Database
{
    public function getAll()
    {
        $sql = 'SELECT * FROM galleries';
        $this->query($sql);
        return $this->multipleSet();
    }

    public function create($headline, $info, $image)
    {
        $sql = "INSERT INTO galleries(headline, info, image) VALUES (:headline, :info, :image)";
        $data = [
            'headline' => $headline,
            'info' => $info,
            'image' => $image
        ];

        $this->query($sql, $data);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM galleries WHERE id = :id";
        $data = [
            'id' => $id
        ];

        $this->query($sql, $data);
        return $this->singleSet();
    }

    public function update($id, $headline, $info, $image)
    {
        $sql = "UPDATE galleries SET headline = :headline, info = :info, image = :image WHERE id = :id";
        $data = [
            'id' => $id,
            'headline' => $headline,
            'info' => $info,
            'image' => $image
        ];

        $this->query($sql, $data);
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM galleries WHERE id = :id";
        $data = [
            'id' => $id
        ];

        $this->query($sql, $data);
    }
}