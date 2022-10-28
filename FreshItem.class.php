<?php

require_once("Item.class.php");

class FreshItem extends Item {

    private string $bestBeforeDate;

    public function setDate($att) {
        $this->bestBeforeDate = $att;
    }
    
    public function getDate() {
        return $this->bestBeforeDate;
    }

    public function __construct($newName,$newPrice,$newWeight,$newDate) {
        parent::__construct($newName,$newPrice,$newWeight);
        $this->setDate($newDate);
    }
}
