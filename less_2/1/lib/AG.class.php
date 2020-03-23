<?php
// Abstract Goods Class
abstract class AG
{
    protected $cost;            // стоимость товара
    protected $earnings;        // сумма выручка
    protected $amount;          // кол-во товара
    protected $totalAmount;     // гросс итог
    
    final public function getCost()     // Гетер стоимости товара
    {
        return $this->cost;
    }
    
    final public function getAmount()   // Геттер кол-ва товара
    {
        return $this->amount;
    }
    
    final public function __construct($cost) // Констурктор объекта с ценой
    {
        $this->cost = $cost;
    } 

    final public function countingTheCost() // Итоговой стоимость товара
    {
        return $this->cost * $this->amount;
    }
    
    protected function addOrder($amount) // Создание заказа
    {
        $this->amount = $amount;
        $this->totalAmount += $amount;
        $this->earnings += self::countingTheCost();
    }
    
    abstract protected function getEarnings(); // Выручка по всем заказам
}
?>