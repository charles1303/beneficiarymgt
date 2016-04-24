<?php
/**
 * Created by PhpStorm.
 * User: charles
 * Date: 4/24/16
 * Time: 6:25 PM
 */

namespace App\Http\Util;
use Mail;

class EmailUtil {

    public static function sendEmailReminder($recipientEmail, $message,$subject)
    {
        Mail::send('emails.reminder', ['recipient' => $recipientEmail], function ($mailDetails) use ($recipientEmail,$message,$subject) {
            $mailDetails->from('benevolence@hotr.com', $message);

            $mailDetails->to($recipientEmail)->subject($subject);
        });
    }

}