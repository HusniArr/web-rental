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
        $sql = `INSERT INTO galleries(headline, info, image) VALUES (:headline, :info, :image)`;
        $data = [
            'headline' => $headline,
            'info' => $info,
            'image' => $image
        ];

        $this->query($sql, $data);
    }
}