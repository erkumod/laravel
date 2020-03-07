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
        ]);
        $dataArr = array(
            'notification_title'                  => $input['notification_title'],
            'notification_desc'            => $input['notification_desc'],
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
        ]);
        $input = $request->all();
        $dataArr = array(
            'notification_title'          => $input['notification_title'],
            'notification_desc'            => $input['notification_desc'],
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
}
