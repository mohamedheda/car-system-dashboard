<?php

namespace CAR\controllers;

use CAR\core\controller;
use CAR\core\helpers;
use CAR\models\car;
use GUMP;

class homecontroller extends controller {
    //only show home page
    public function index(){
        $this->view(VIEW."\home\index",[]);
    }

    //show the form to add a car
    public function add(){
        $this->view(VIEW."\home\add",[]);
    }

    public function validateForm($post){
        $is_valid=GUMP::is_valid(array_merge($post),[
            'name'=>'required|alpha_numeric',
            'cost'=>'required|integer',
            'discription'=>'required',
            'img'=>'required|valid_url'
        ]);
        return $is_valid;
    }

    //check the data if is valedate then save it in db
    public function store(){
        $is_valid=$this->validateForm($_POST);
        if ($is_valid === true) {
            $car=new car();
            $car->addCar($_POST['name'],$_POST['cost'],$_POST['discription'],$_POST['img']);
            helpers::redirect('home/show');
        } else {
            $this->view(VIEW."\home\add",['errors'=>$is_valid]);
        }
    }
    
    //show cars if are exist
    public function show(){
        $car=new car();
        $cars=$car->getCars();
        if(!empty($cars)){
            $this->view(VIEW."\home\show",['cars'=>$cars]);
        }else{
            helpers::redirect('home/index');
        }
    }

// delelte cars from show and database
    public function delete(){
        $car=new car();
        if($car->delete($_GET['id'])){
            helpers::redirect('home/show');
        }
    }

//get data to edit in the form
    public function edit(){
        $car=new car();
        $oneCar=$car->getCar($_GET['id']);
        $this->view(VIEW."\home\\edit",['car'=>$oneCar]);
    }

    public function update(){
        $is_valid=$this->validateForm($_POST);
        if ($is_valid === true) {
        $car=new car();
        $car->update($_POST);
        helpers::redirect('home/show');
        }else {
            $this->view(VIEW."\home\\edit",['errors'=>$is_valid]);
        }
    }
}