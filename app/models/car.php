<?php
namespace CAR\models;
use CAR\core\model;
use PDO;

class car extends model {

    public function addCar($name,$cost,$discription,$img){
        $this->db()->insert('car',[
            'name'=>$name,
            'cost'=>$cost,
            'discription'=>$discription,
            'img'=>$img
        ]);
    }

    public function getCars(){
        $cars=$this->db()->run("SELECT * FROM car")->fetchAll();
        return $cars;
    }

    public function delete($id){
        $this->db()->deleteById('car', $id);
        return 1;
    }
    
    public function getCar($id){
        $car=$this->db()->run("SELECT * FROM car WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
        return $car;
    }

    public function update($post){
        $data = [
            'name' =>$post['name'],
            'cost' => $post['cost'],
            'discription' => $post['discription'],
            'img' =>$post['img']
        ];
        $where = ['id' => $post['id']];
        $this->db()->update('car', $data, $where);
    }

}