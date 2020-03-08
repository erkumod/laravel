<?php

namespace App\Http\Controllers;

use App\Notifications;
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

    public function TestNotification(Type $var = null)
    {

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        $message = "This is test notification";

        $device_id = "This is my device id";
        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
        $api_key = 'AAAAKZLje1I:APbGQDw8FD...TjmtuINVB-g';
                    
        $fields = array (
            'registration_ids' => array (
                    $device_id
            ),
            'data' => array (
                    "message" => $message
            )
        );
    
        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}
