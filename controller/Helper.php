<?php

 /**
  * 
  */
 class Helper 
 {
     function __construct()
     {
         # code...
     }
     public static function time_elapsed_string($datetime, $full = false){

        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'año',
            'm' => 'mes',
            'w' => 'semana', 
            'd' => 'día',
            'h' => 'hora',
            'i' => 'minuto',
            's' => 'segundo',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? sprintf('hace %s', implode(', ', $string)) : 'ahora mismo';
    }
    public static function rand_color($opacity = 1) {
        return "rgba(" . rand(0, 255) . ", " . rand(50, 255) . ", " . rand(10, 255) . ", " . $opacity . ")";
    }
    public static function response_message($title = '', $message = '', $status = 'success', $data = '') {
        $res = [
            'title' => $title,
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ];
        echo json_encode($res); 
        die();
    }
    public static function date_formated($date_parts = ['year' => '','mon' => '', 'mday' => '']){
        $date = getdate();
        $current_date = $date['year']."-".$date['mon']."-".$date['mday'];
        return $current_date;
    }
}

