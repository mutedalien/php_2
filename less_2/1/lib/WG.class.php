<?php
// Weight Goods Class
class WG extends AG // Весовой товар
{
    public function addOrder($amount)
    {
        parent::addOrder($amount);
        echo "Стоимость 1 кг гречки: ".$this -> getCost()." руб.<br>";
        echo "Кол-во кг заказано: ".$this -> getAmount()." кг.<br>";
        echo "Итого покупка составила: ".$this -> countingTheCost()." руб.<br>";        
    }

    public function getEarnings() // Выручка
    {
        echo 'Выручка от продажи (' .$this->totalAmount. ' кг) составила: ' . $this->earnings . ' руб.';    
    }
        
}
?>