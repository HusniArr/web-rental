<?php

class Service_model extends Database {

    public function getAll()
    {
        $sql = 'SELECT * FROM services ORDER BY id DESC';
        $this->query($sql);
        return $this->multipleSet();
    }

    public function create($carName, $carType, $cost, $detail, $image)
    {
        $sql = "INSERT INTO services(car_name, car_type, cost, detail, image) VALUES (:car_name, :car_type, :cost, :detail, :image)";
        $data = [
            'car_name' => $carName,
            'car_type' => $carType,
            'cost' => $cost,
            'detail' => $detail,
            'image' => $image
        ];

        $this->query($sql, $data);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM services WHERE id = :id";
        $data = [
            'id' => $id
        ];

        $this->query($sql, $data);
        return $this->singleSet();
    }

    public function update($id, $carName, $carType, $cost, $detail, $image)
    {
        $sql = "UPDATE services SET car_name = :car_name, car_type = :car_type, cost = :cost, detail = :detail, image = :image WHERE id = :id";
        $data = [
            'id' => $id,
            'car_name' => $carName,
            'car_type' => $carType,
            'cost' => $cost,
            'detail' => $detail,
            'image' => $image
        ];

        $this->query($sql, $data);
    }

    public function delete($id) 
    {
        $sql = "DELETE FROM services WHERE id = :id";
        $data = [
            'id' => $id
        ];

        $this->query($sql, $data);
    }

    public function getCount()
    {
        $sql = 'SELECT * FROM services';
        $this->query($sql);

        return $this->rowCount();
    }

    public function getAllByLimit($start, $perPage)
    {
        $sql = 'SELECT * FROM services LIMIT '.$perPage.' OFFSET '.$start.' ';
        $this->query($sql);

        return $this->multipleSet();
    }
}