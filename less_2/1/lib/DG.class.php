<?php
// Digital Goods Class
class DG extends AG // Цифровой товар
{
    public function addOrder($amount) 
    {
        parent::addOrder($amount);
        echo "Стоимость фьючерса на 1 мешок гречки: ".$this -> getCost()." руб.<br>";
        echo "Количество мешков заказанно: ".$this -> getAmount()." шт.<br>";
        echo "Сумма заказа: ".$this -> countingTheCost()." руб.<br>";
    }

    public function getEarnings() // Выручка
    {
        echo 'Выручка с реализованных фьючерсов в количестве (' .$this->totalAmount. ' шт) составила: ' . $this->earnings . ' руб.';
    }
}
?>