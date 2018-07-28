<?php


class Helpers{

    public static function getRusMonth($date, $register = 'normal'){
        $months = array( 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' );

        if($register == 'lower'){
            foreach ($months as &$month) $month = mb_strtolower($month);
            unset($month);
        }
        elseif($register == 'upper'){
            foreach ($months as &$month) $month = mb_strtoupper($month);
            unset($month);
        }

        return $months[date( 'n' , strtotime($date))];
    }
}