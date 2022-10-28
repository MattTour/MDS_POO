<?php

require_once('Item.class.php');
require_once('FreshItem.class.php');
require_once('Ticket.class.php');

class ShoppingCart {

    private $articles = array();
    private int $id;

    public function setId($att) {
        $this->id = $att;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getArticles() {
        return $this->articles;
    }

    public function addItem($newName, $newPrice, $newWeight) {
        $totalWeight = 0;
        foreach ($this->articles as $unArticle) {
            if(!$unArticle instanceof Ticket){
                $totalWeight += $unArticle->getWeight();
            }
        }
        if ($totalWeight+$newWeight > 10000) {
            echo "Votre panier ne peut pas dépasser 10kg, désolé !<br>";
        }
        else {
            $article = new Item($newName,$newPrice,$newWeight);
            $this->articles[] = $article;
        }
    }

    public function addFreshItem($newName, $newPrice, $newWeight, $newDate) {
        $totalWeight = 0;
        foreach ($this->articles as $unArticle) {
            if(!$unArticle instanceof Ticket){
                $totalWeight += $unArticle->getWeight();
            }
        }
        if ($totalWeight+$newWeight > 10000) {
            echo "Votre panier ne peut pas dépasser 10kg, désolé !<br>";
        }
        else {
            $article = new FreshItem($newName,$newPrice,$newWeight,$newDate);
            $this->articles[] = $article;
        }
    }

    public function addTicket($newName, $newPrice) {
        $article = new Ticket($newName,$newPrice);
        $this->articles[] = $article;
    }

    public function removeItem($item) {
        if(in_array($item,$this->articles))
        {
            if (($key = array_search($item, $this->articles)) !== false) {
                unset($this->articles[$key]);
            }
        }
        else {
            print("Ce produit n'est pas dans votre panier<br>");
        }
    }

    public function itemCount() {
        echo "Il y a " . count($this->articles) . " produits dans le panier<br>";
    }

    public function totalPrice() {
        $totalPrice = 0;
        foreach ($this->articles as $unArticle) {
            $totalPrice += $unArticle->getPrice();
        }
        echo "Le prix total est de " . $totalPrice . " €<br>";
    }

    public function toString() {
        echo "N° Panier: " . $this->getId() . " | Nb produits: " . count($this->articles) . "<br>";
        foreach ($this->articles as $unArticle) {
            if($unArticle instanceof Ticket){
                echo "Nom produit: " . $unArticle->getRef() . " | Prix: " . $unArticle->getPrice() . "<br>";
            }else{
                echo "Nom produit: " . $unArticle->getName() . " | Prix: " . $unArticle->getPrice() . " | Poids: " . $unArticle->getWeight() . "<br>";
            }
        }
    }

    public function __construct($newId) {
        $this->setId($newId);
    }
}
