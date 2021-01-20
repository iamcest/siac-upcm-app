<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

    public static function convert_slug($text)
    {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $text);

        // -- Returns the slug
        return strtolower(strtr($text, $table));
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

    public static function send_mail($subject, $recipients = [], $message = '', $respondTo = '', $file = []) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP(); // Send using SMTP
            $mail->Host       = EMAIL_HOST; // Set the SMTP server to send through
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = EMAIL_ACCOUNT; // SMTP username
            $mail->Password   = EMAIL_PASSWORD; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


            $mail->setFrom(EMAIL_ACCOUNT, 'Suite');

            //Recipients
            foreach ($recipients as $recipient) {
                $mail->addAddress($recipient['email'], $recipient['full_name']);
            }
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject; // Set Subject
            $mail->Body    = $message; // Set body message

            foreach ($file as $attachment) {
                if ($attachment['name'] != '') {
                    $mail->addAttachment($attachment['url'], $attachment['name']);
                }
                else {
                    $mail->addAttachment($attachment['url']);            
                }
            }
            $mail->send();
            return true;
        } catch (Exception $e) {
            return "No se pudo enviar el mensaje. Error generado: {$mail->ErrorInfo}";
        }
        return $mail;
    }
    public static function date_formated($date_parts = ['year' => '','mon' => '', 'mday' => '']){
        $date = getdate();
        $current_date = $date['year']."-".$date['mon']."-".$date['mday'];
        return $current_date;
    }
}

