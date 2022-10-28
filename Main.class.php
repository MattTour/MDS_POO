<?php

require_once('Item.class.php');
require_once('ShoppingCart.class.php');
require_once('FreshItem.class.php');
require_once('Ticket.class.php');
require_once('Payable.class.php');
require_once('Invoice.class.php');

class Main {

public $numPanier = 1;

public function vardump($att) {
    if($att instanceof FreshItem){
        echo $att->getDate() . "<br>";
    }
    echo $att->getName() . ": " . number_format(strval($att->getPrice()/100), 2, '.', '') . " €<br>";
}

public function testItem() {
    $item = new Item("corn flakes", 500, "0");
    var_dump($item->getName()); // affiche: corn flakes
    var_dump($item->getPrice()); // affiche: 500
    $item = new Item("corn flakes", 500, "0");
    self::vardump($item); // affiche: corn flakes: 5.00 €
    $chewingGum = new Item("chewing gum",403, "0");
    self::vardump($chewingGum); // affiche: chewing gum: 4.03 €
}

public function testPanier() {
    $panier = new ShoppingCart($this->numPanier);
    $this->numPanier++;
    $panier->addItem("Corn flakes",500,200);
    $panier->addItem("Papier",430,300);
    $panier->addItem("Papier Russe",430,9900);
    var_dump($panier);
    $panier->itemCount();
    $panier->totalPrice();
    $panier->removeItem(new Item("Corn flakes", 500, 200));
    $panier->removeItem(new Item("Pap", 500, 200));
    var_dump($panier);
    $panier->addItem("Coton",200,800);
    $panier->toString();
    $panier2 = new ShoppingCart($this->numPanier);
    $this->numPanier++;
    $panier2->addItem("Oeuf",500,200);
    $panier2->addItem("PQ",430,300);
    $panier2->addItem("Papier Russe",430,9900);
    var_dump($panier2);
    $panier2->itemCount();
    $panier2->totalPrice();
    $panier2->removeItem(new Item("Oeuf", 500, 200));
    $panier2->removeItem(new Item("Pap", 500, 200));
    var_dump($panier2);
    $panier2->addItem("Coton-tige",200,800);
    $panier2->toString();
}

public function testFreshItem() {    
    $freshItem = new FreshItem("Fraises", 320, 100, "2022-12-09");
    self::vardump($freshItem);
}

public function testTicket() {    
    $ticket = new Ticket("Concert - 698", 320);
    var_dump($ticket);
}

public function testInvoice() {
    $panier = new ShoppingCart($this->numPanier);
    $this->numPanier++;
    $panier->addFreshItem("Fraises", 320, 100, "2022-12-09");
    $panier->addTicket("Concert - 698", 320);
    $panier->addTicket("Concert - 988", 220);
    $panier->addItem("Papier",430,900);
    var_dump($panier);
    $panier->itemCount();
    $panier->totalPrice();
    $panier->toString();
    $panier->removeItem(new Ticket("Concert - 988", 220));
    var_dump($panier);
    $facture = new Invoice;
    foreach ($panier->getArticles() as $unArticle) {
        $facture->add(new Payable($unArticle));
    }
    var_dump($facture);
    $facture->totalAmount();
    $facture->totalTax();
}

}

$main = new Main;
// $main->testItem();
// $main->testFreshItem();
// $main->testPanier();
// $main->testTicket();
$main->testInvoice();
