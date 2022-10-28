<?php

class Invoice {

    private $invoiceList = array();

    public function add(Payable $att) {
        $this->invoiceList[] = $att;
    }

    public function totalAmount(){
        $totalPrice = 0;
        foreach ($this->invoiceList as $unPayable) {
            $totalPrice += $unPayable->getCost();
        }
        echo "Le prix total est de " . $totalPrice . " €<br>";
    } 

    public function totalTax(){
        $totalTax = 0;
        foreach ($this->invoiceList as $unPayable) {
            $totalTax += ($unPayable->getTax()/10000)*$unPayable->getCost();
        }
        echo "Les taxs totales sont de " . $totalTax . " €<br>";
    }

    public function __construct(){
    }
}
