<?php
// Piece Goods Class
class PG extends AG // Штучный товар
{
    public function addOrder($amount)
    {
        parent::addOrder($amount);
        echo "Стоимость 1 мешка гречки: ".$this -> getCost()." руб.<br>";
        echo "Количество мешков заказано: ".$this -> getAmount()." шт.<br>";
        echo "Итого покупка составила: ".$this -> countingTheCost()." руб.<br>";        
    }

    public function getEarnings() // Выручка
    {
        echo 'Выручка от продажи товара в коичестве (' .$this->totalAmount. ' мешков) составила: ' . $this->earnings . ' руб.';
    }
}
?>