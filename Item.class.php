<?php

class Item {

    private string $name;
    private float $price;
    private int $weight;

    public function setName($att) {
        $this->name = $att;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setPrice($att) {
        $this->price = $att;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setWeight($att) {
        $this->weight = $att;
    }
    
    public function getWeight() {
        return $this->weight;
    }

    public function __construct($newName, $newPrice, $newWeight){
        $this->setName($newName);
        $this->setPrice($newPrice);
        $this->setWeight($newWeight);
    }
}
