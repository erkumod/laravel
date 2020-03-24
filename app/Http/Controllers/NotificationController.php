<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\PushNotification;
use Illuminate\Http\Request;

use Config;
use StdClass;
use Validator;

use Yajra\Datatables\Datatables;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notification.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $getdata =  Notifications::where('user_id',null)->get();
        return Datatables::of($getdata)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'notification_title' => ['required', 'max:255'],
            'notification_desc' => ['required', 'max:255'],
            'user_type' => ['required', 'max:255'],
        ]);
        $dataArr = array(
            'notification_title'                  => $input['notification_title'],
            'notification_desc'            => $input['notification_desc'],
            'user_type'            => $input['user_type'],
        );
        // if($validatedData->fails()){
        //     return redirect('/admin/notification/create')->withErrors($validatedData)->withInput();
        // }
        $notification = Notifications::create($dataArr);
        $push = PushNotification::get();
        if($push){
            $registatoin_ids = array();
            foreach ($push as $i => $noti) {
                $notification_token = $noti->notification_token;
                array_push($registatoin_ids,$notification_token);
            }
            $fields = array(
                'registration_ids' => $registatoin_ids,
                'notification' => array (
                        "title" => $input['notification_title'],
                        "body" => $input['notification_desc'],
                    )
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
            // if ($result === FALSE) {
                // die('Curl failed: ' . curl_error($ch));
            // }
            curl_close($ch);
            return $result;
        }
        return redirect('/admin/notification')->with("success", "Notification added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notifications  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notifications $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notifications  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifications $notification)
    {
        // $form = Notifications::where('id',$id)->first()->toArray();
        // if(empty($form)){
        //     return redirect('/admin/notification')->with("error", "Notification not found.");
        // }
        // $dataArr = array('id' => $id);
        // $dataArr['question']    = $form['question'];
        // $dataArr['answer']      = $form['answer'];
        return view('admin.notification.edit')->with('form', (object)$notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notifications  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notifications $notification)
    {
        $validatedData = $request->validate([
            'notification_title' => ['required', 'max:255'],
            'notification_desc' => ['required', 'max:255'],
            'user_type' => ['required', 'max:255'],
        ]);
        $input = $request->all();
        $dataArr = array(
            'notification_title'          => $input['notification_title'],
            'notification_desc'            => $input['notification_desc'],
            'user_type'            => $input['user_type'],
        );
        $notification->update($dataArr);
        return redirect('/admin/notification')->with("success", "Notification updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notifications  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifications $notification)
    {
        $notification->delete();
        return response()->json(["message" => 'Notification deleted!'], 200);
    }

    public function TestNotification(Request $request)
    {
        $registatoin_ids = array();
        $gcm_regid = $request->user()->id;
        // $gcm_regid = "ctW1vgj56F4:APA91bG-E4WCGn3jVpRbMBIpGCQN9veUbgNXETEo76rJ9RzqPDCY20Lt7h-3l5PwYPLI1A-IqId2Ml5pVuooHlrLW4rEFDGrLXMEryK9Mx_lms_natv-ikNzKCK1dNL8aRrn5eOlbbxZ";
        array_push($registatoin_ids,$gcm_regid);
        $message = "This is test By hiren";
        $title = 'swipe';
        $result = NotificationController::sendPushNotification($message,$registatoin_ids,$title);
        $result = json_decode($result);
        dd($result);
    }

    public static function sendPushNotification($message,$user_id,$title = "Swipe",$user_type = null)
    {
        $push = PushNotification::where('user_id',$user_id)->first();
        $data = array(
            'notification_title' => $title,
            'notification_desc' => $message,
            'user_id'   => $user_id,
            'user_type'          => $user_type,
            'type'       => 'user_action'
        );
        Notifications::create($data);
        if($push){
            $notification_token = $push->notification_token;
            if($notification_token){
                if($push->os == "ios"){
                    $apns_user_id = $user_id;
                    $deviceToken  = $notification_token;            
                    $passphrase = '123456';				
                    $ctx = stream_context_create();
                    $ckName = "/var/www/swipe-web/ck.pem";
                    
                    stream_context_set_option($ctx, 'ssl', 'local_cert', $ckName);
                    stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                    $fp = stream_socket_client(
                            'ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
                    
                    if (!$fp)
                        exit("Failed to connect: $err $errstr" . PHP_EOL);
                    $counter = 1;
                    $body['aps'] = array('sound'=>"default",'alert' => $message,'badge'=>$counter);
                    $payload = json_encode($body);
        
                    $msg = chr(0) . pack('n', 32) . pack('H*', $notification_token) . pack('n', strlen($payload)) . $payload;			
                    $result = fwrite($fp, $msg, strlen($msg));
                    
                    if (!$result)
                        return 'Message not delivered - Customer' . PHP_EOL;
                    else
                        return 'Message successfully delivered - Customer' . PHP_EOL;
                    fclose($fp);
                }else{

                    $registatoin_ids = array();
                    array_push($registatoin_ids,$notification_token);
                    $fields = array(
                        'registration_ids' => $registatoin_ids,
                        'notification' => array (
                                "body" => $message,
                                "title" => $title,
                            )
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
                    // if ($result === FALSE) {
                        // die('Curl failed: ' . curl_error($ch));
                    // }
                    curl_close($ch);
                    return $result;
                }
            }
        }
        return false;
    }

    public function getPushList(Request $request)
    {
        $response = new StdClass;
        $response->status = 400;
        $response->message = "No current notification";
        $response->notifications = null;
        $user_id=$request->user()->id;
        if($user_id){
            $notifications = Notifications::where('user_id',$user_id)->where('user_type',$request->user_type)->get();
            $response->notifications = $notifications;
            $response->status = 200;
            $response->message = 'success';
        }
        return response()->json($response);
    }
    public function deletePushList(Request $request)
    {
        $response = new StdClass;
        $response->status = 400;
        $response->message = "No current notification";
        $response->notifications = null;
        $user_id=$request->user()->id;
        if($user_id){
            $notifications = Notifications::where('user_id',$user_id)->where('user_type',$request->user_type)->delete();
            $response->status = 200;
            $response->message = 'success';
        }
        return response()->json($response);
    }
}
