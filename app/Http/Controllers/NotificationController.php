<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\PushNotification;
use Illuminate\Http\Request;

use Config;
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
        $getdata =  Notifications::get();
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

    public static function sendPushNotification($message,$user_id,$title = "Swipe")
    {
        $push = PushNotification::where('user_id',$user_id)->first();
        if($push){
            $notification_token = $push->notification_token;
            if($notification_token){
    
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
        return false;
    }
}
