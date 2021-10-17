<?php

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Helper
{
    public function __construct()
    {
        # code...
    }
    public static function rand_color($opacity = 1)
    {
        return "rgba(" . rand(0, 255) . ", " . rand(50, 255) . ", " . rand(10, 255) . ", " . $opacity . ")";
    }

    public static function convert_first_letter_uppercase($string) 
    {
        $strings = explode('-', $string);
        $string = '';
        foreach ($strings as $str) {
            $string .= ucfirst($str);
        }
        return $string;
    }

    public static function convert_slug($text)
    {
        $table = array(
            'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
            'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
            'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
            'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r', '/' => '-', ' ' => '-',
        );

        // -- Remove duplicated spaces
        $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $text);

        // -- Returns the slug
        return strtolower(strtr($text, $table));
    }

    public static function datetime_formatted()
    {
        $datetime = new DateTime();

        return $datetime->format('Y-m-d H:i:s');
    }

    public static function response_message($title = '', $message = '', $status = 'success', $data = '')
    {
        $res = [
            'title' => $title,
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ];
        echo json_encode($res);
        die();
    }

    public static function send_mail($subject, $recipients = [], $replyTo = [], $message = '', $file = [])
    {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = EMAIL_HOST; // Set the SMTP server to send through
            $mail->SMTPAuth = EMAIL_HOST == 'localhost' ? false : true; // Enable SMTP authentication
            if (EMAIL_HOST == 'localhost') {
                $mail->SMTPAutoTLS = false;
            } else {
                $mail->Username = EMAIL_ACCOUNT; // SMTP username
                $mail->Password = EMAIL_PASSWORD; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            }
            $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            $mail->setFrom(EMAIL_ACCOUNT, 'Suite');

            //Recipients
            foreach ($recipients as $recipient) {
                $mail->addAddress($recipient['email'], $recipient['full_name']);
            }
            if (!empty($replyTo)) {
                $mail->addReplyTo($replyTo['email'], $replyTo['full_name']);
            }
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = utf8_decode($subject); // Set Subject
            $mail->Body = utf8_decode($message); // Set body message

            foreach ($file as $attachment) {
                if ($attachment['name'] != '') {
                    $mail->addAttachment($attachment['url'], $attachment['name']);
                } else {
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

    public static function date_formated($date_parts = ['year' => '', 'mon' => '', 'mday' => ''])
    {
        $date = getdate();
        $current_date = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
        return $current_date;
    }

    public static function rand_string($length = 16)
    {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public static function encrypt($string = '')
    {
        if (empty($string)) {
            return $string;
        }

        $key = Key::loadFromAsciiSafeString(ENCRYPT_KEY);
        return Crypto::encrypt($string, $key);
    }

    public static function decrypt($string = '')
    {
        if (empty($string)) {
            return $string;
        }

        $key = Key::loadFromAsciiSafeString(ENCRYPT_KEY);
        return Crypto::decrypt($string, $key);
    }
}
