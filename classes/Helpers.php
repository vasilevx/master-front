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

    public static function showDate($begin_date, $end_date){
        $begin = '';
        $end = '';

        if($begin_date)
            $begin = new DateTime($begin_date);
        if($end_date)
            $end = new DateTime($end_date);

        if($begin && $end){
            if((int)$begin->format('m') === (int)$end->format('m')){
                if((int)$begin->format('d') === (int)$end->format('d'))
                    echo $begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
                else
                    echo $begin->format('j').'–'.$end->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
            }
            else{
                echo $begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower').' — '.$end->format('j').' '.Helpers::getRusMonth($end->format('d.m.Y'), 'lower');
            }
        }
        elseif($begin){
            echo $begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
        }
        elseif($end){
            echo $end->format('j').' '.Helpers::getRusMonth($end->format('d.m.Y'), 'lower');
        }
    }

    public static function diffInDays($date1, $date2 = null){
        if (!$date2) $date2 = date('Y-m-d');

        $begin_date = new DateTime($date1);
        $current_date = new DateTime($date2);

        return (int) $begin_date->diff($current_date)->format('%r%a');
    }
}