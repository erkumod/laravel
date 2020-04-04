<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CarWashBooking;
use App\PushNotification;

class SendWasherNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'completewash:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send push notification to washer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // \Log::info('into the cron');
        $bookings = CarWashBooking::where('wash_start_time',  '<', \Carbon\Carbon::now()->subHours(2)->toDateTimeString())
        ->where('status','Started')->get();
        // \Log::info($bookings);
        $data = [];
        foreach ($bookings as $key => $booking) {
            $data[] = array(
                'notification_title' => "Booking",
                'notification_desc' => "Please Complete your current job",
                'user_id'           => $booking->accepted_by,
                'user_type'         => 'washer',
                'type'       => 'user_action',
                'page'       => "start_wash",
            );
        }
        if(count($data) > 0){
            Notifications::insert($data);
        }
        if(!is_null($bookings)){
            $bookings = $bookings->pluck('accepted_by');
            $andrTokens = PushNotification::whereIn('user_id',$bookings)->where('os','!=','ios')->get();
            $iosTokens = PushNotification::whereIn('user_id',$bookings)->where('os','ios')->get();
            if (!is_null($iosTokens)) {
                foreach ($iosTokens as $key => $token) {
                    $deviceToken  = $token->notification_token;            
                    $passphrase = '123456';				
                    $ctx = stream_context_create();
                    $ckName = "/var/www/swipe-web/ck.pem";
                    stream_context_set_option($ctx, 'ssl', 'local_cert', $ckName);
                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                    $fp = stream_socket_client(
                            // 'ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                            'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                    
                    if (!$fp)
                        exit("Failed to connect: $err $errstr" . PHP_EOL);
                    $push = PushNotification::where('id',$token->id)->first();
                    $push->counter = $push->counter + 1;
                    $push->save();

                    $body = array('page'=>'start_wash');
                    $body['aps'] = array('sound'=>"default",'alert' => "Please Complete your current job",'badge' => $push->counter);
                    $payload = json_encode($body);
        
                    $msg = chr(0) . pack('n', 32) . pack('H*', $notification_token) . pack('n', strlen($payload)) . $payload;			
                    $result = fwrite($fp, $msg, strlen($msg));
                    
                    if (!$result)
                        return 'Message not delivered - Customer' . PHP_EOL;
                    else
                        // \Log::info("message delevered ios");
                        return 'Message successfully delivered - Customer' . PHP_EOL;
                    fclose($fp);
                }
            }
            if (!is_null($andrTokens)) {
                $andrTokens = $andrTokens->pluck('notification_token');
                $fields = array(
                    'registration_ids' => $andrTokens,
                    'notification' => array (
                            "body" => "Please Complete your current job",
                            "title" => "Booking",
                    ),
                    "data" => array(
                        "page" => "start_wash",
                    ),
                );
                $GOOGLE_API_KEY = env('G_API_KEY');
                $FCM_URL = 'https://fcm.googleapis.com/fcm/send';
                $headers = array(
                    'Authorization: key=' . $GOOGLE_API_KEY,
                    'Content-Type: application/json'
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $FCM_URL);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);   
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);         
                // \Log::info("message delevered android");
                // if ($result === FALSE) {
                    // die('Curl failed: ' . curl_error($ch));
                // }
                curl_close($ch);
            }
        }
    }
}
