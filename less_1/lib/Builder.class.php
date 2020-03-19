<?php

class Builder
{
    // Данные об объекте
    private $completion_day; // Дата завершения строительства
    private $complex; // Название жилого комплекса

    // Акции
    private $discount; // Возможные акции и скидки

    // Продажи
    private $sales_date; // День старта продаж
    private $number_of_apartments; // Кол-во квартир
    private $number_of_studios; // Кол-во студий

    // Динамика продаж
    private $nubmer_of_sold_apartments; // Кол-во проданных квартир
    private $nubmer_of_sold_studios; // Кол-во проданных студий

    // Конструктор
    function __construct($completion_day, $complex)
    {
        $this->completion_day = $completion_day;
        $this->complex = $complex;
        }

    // Назначение активных скидок
    public function addDiscount($new_discount)
    {
        $this->discount.=" ".$new_discount;
    }

    // Стартуем продажи
    public function newSales($sales_date, $number_of_apartments, $number_of_studios)
    {
        $this->sales_date = $sales_date;
        $this->number_of_apartments = $number_of_apartments;
        $this->number_of_studios = $number_of_studios;
    }

    // Динамика продаж квартир
    public function soldApartments($number)
    {
        if ($this->number_of_apartments<$number){
            echo "<b style='font-size:1.2em'>Превышение количества свободных квартир!</b>";
        }else{
            $this->number_of_apartments -= $number;
            $this->nubmer_of_sold_apartments += $number;
        }
    }

    // Динамика продаж студий
    public function soldStudios($number)
    {
        if ($this->number_of_studios<$number){
            echo "<b style='font-size:1.2em'>Превышение количества свободных студий!</b>";
        }else{
            $this->number_of_studios -= $number;
            $this->nubmer_of_sold_studios += $number;
        }
    }

    
    public function getInfoAboutApartment($case)
    {
        switch ($case)
        {
            case "complex": // Жилой комплекс
                return $this->complex;
                break;
            case "discount": // Акции и скидки
                return $this->discount;
                break;
            case "sales_date": // Дата старта продаж
                return $this->sales_date;
                break;
            case "number_of_apartments": // Количество квартир
                return $this->number_of_apartments;
                break;
            case "number_of_studios": // Количество студий
                return $this->number_of_studios;
                break;
            case "nubmer_of_sold_apartments": // Количество проданных квартир
                return $this->nubmer_of_sold_apartments;
                break;
            case "nubmer_of_sold_studios": // Количество проданных студий
                return $this->nubmer_of_sold_studios;
                break;
        }
    }
}