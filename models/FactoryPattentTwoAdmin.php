<?php
// require_once 'ManufactureModel.php';
// require_once 'ProductModel.php';
require_once 'ProtypeModel.php';

class FactoryPattentTwoAdmin{
    public function make ($model){
        if($model == 'manu'){
            return ManufactureModel::getInstance();
        }
        else if($model == 'product'){
            return ProductModel::getInstance();
        }
         if($model == 'protype'){
            return ProtypeModel::getInstance();
        }
        return null;
    }
}
?>