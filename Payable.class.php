<?php

class Payable {

    private string $label;
    private float $cost;
    private int $tax;

    public function setLabel($att) {
        $this->label = $att;
    }
    
    public function getLabel() {
        return $this->label;
    }

    public function setCost($att) {
        $this->cost = $att;
    }
    
    public function getCost() {
        return $this->cost;
    }

    public function setTax($att) {
        $this->tax = $att;
    }
    
    public function getTax() {
        return $this->tax;
    }

    public function label($att) {
        if($att instanceof FreshItem){
            $this->setLabel($att->getName());
            return $att->getName();
        }else if($att instanceof Item){
            $this->setLabel($att->getName());
            return $att->getName();
        }else if($att instanceof Ticket){
            $this->setLabel($att->getRef());
            return $att->getRef();
        }
    }
    
    public function cost($att) {
        $this->setCost($att->getPrice());
        return $att->getPrice();
    }

    public function taxRatePerTenThousand($att) {
        if($att instanceof FreshItem){
            $tax = 1000 - 100*((int) ($att->getWeight() / 1000));
            $this->setTax($tax);
            return $tax;
        }else if($att instanceof Item){
            $this->setTax(1000);
            return 1000;
        }else if($att instanceof Ticket){
            $this->setTax(2500);
            return 2500;
        }
    }

    public function __construct($att){
        $this->label($att);
        $this->cost($att);
        $this->taxRatePerTenThousand($att);
    }
}
