<?php
require_once 'models/FactoryPattent.php';

require_once('models/ZipcodeModel2.php');

class Reponsitory 
{
    public function insertRepository($data)
    { 
        $zipcode = null;
        // $zipcode = new ZipcodeModel();
        //Application pass Factory
        $factory = new FactoryPattent();
        $user = $factory->make('home');
        $insertUser = $user->insertUserDecorator($data , $zipcode);
        // Check cost rong khong.
        // Neu rong thì them vao khi tao user moi
       
        return $insertUser;
    }
}