<?php

namespace App\Listeners;

use App\ActivationCode;
use App\Events\SendSMSCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\QueueableCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;
use SoapClient;
use SoapFault;

class SendSMSNotification implements ShouldQueue
{
    use InteractsWithQueue,Queueable;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  SendSMSCode  $event
     * @return void
     */
    public function handle(SendSMSCode $event)
    {
       $this->sendCode($event->user , $event->activationCode);
    }

    public function sendCode( $userName ,$eventCode)
    {
        $client = new SoapClient("http://sms.modirpayamak.com/class/sms/wsdlservice/server.php?wsdl");
        $user = "9384446491";
        $pass = "2890065707";
        $fromNum = "+983000505";
        $toNum = array($userName->mobile);
        $pattern_code = "phzws3ioyo";
        $input_data = array(
            "name" => $userName->name,
            "code" => $eventCode
        );
        if ($client == false) {
            Session::flash('danger', 'مشکل در برقراری ارتباط با سرور لطفا بعد از مدتی اقدام به ورود به سایت نمایید.');

        } else {

            try {
                $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
                if ($client) {
                    Session::flash('success', 'کد با موفقیت به مولایل شما ارسال شد لطفا شماره موبایل خود را تایید نمایید');
                } else {
                    Session::flash('danger', 'مشکل در ارسال کد لطفا بعد از مدتی دوباره تلاش کنید');
                }
            } catch (SoapFault $exception) {
                Session::flash('danger', 'مشکل در ارتباط با سرور لطفا بعد از مدتی دوباره تلاش کنید');
            }
        }
    }
}
