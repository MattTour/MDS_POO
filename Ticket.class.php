<?php

class Ticket {

    private string $ref;
    private float $price;

    public function setRef($att) {
        $this->ref = $att;
    }
    
    public function getRef() {
        return $this->ref;
    }

    public function setPrice($att) {
        $this->price = $att;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function __construct($newRef, $newPrice){
        $this->setRef($newRef);
        $this->setPrice($newPrice);
    }
}
