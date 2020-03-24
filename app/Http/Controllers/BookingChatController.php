<?php

namespace App\Http\Controllers;

use App\BookingChat;
use App\PushNotification;
use Illuminate\Http\Request;
use StdClass;
use Response;
class BookingChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = new StdClass;
        $response->status = 400;
        $response->message = "Please send all data";
        $response->messageRes = null;

        $message = $request->message;
        $booking_id = $request->booking_id;
        $receiver_id = $request->receiver_id;
        $is_washer = filter_var($request->is_washer, FILTER_VALIDATE_BOOLEAN);
        $sender_id = $request->user()->id;
        
        if($booking_id && $message && $receiver_id){
            $data = array(
                'message' => $message,
                'booking_id' => (int) $booking_id,
                'receiver_id' => (int) $receiver_id,
                'flag' => 'unread',
                'is_washer' => $is_washer,
                'sender_id' => $sender_id,
            );
            $messageRes = BookingChat::create($data);
            $response->messageRes = $messageRes;
            $response->status = 200;
            $response->message = 'success';
            $title = "Booking";
            $msg = "You have new msg for booking";
            $user_type = $is_washer ? 'washer' : 'customer';
            $result = NotificationController::sendPushNotification($msg,$receiver_id,$title,$user_type);
        }
        return response()->json($response);
    }

    public function getMessages(Request $request)
    {
        $response = new StdClass;
        $response->status = 400;
        $response->message = "Please send all data";
        $response->messageRes = null;
        $booking_id = $request->booking_id;
        if($booking_id){
            $messageRes = BookingChat::where('booking_id',$booking_id)->get();
            $response->messageRes = $messageRes;
            $response->status = 200;
            $response->message = 'success';
            if($request->user_type == "washer"){
                BookingChat::where('booking_id',$booking_id)->update(['washer_flag' => 'read']);
            }else{
                BookingChat::where('booking_id',$booking_id)->update(['flag' => 'read']);
            }
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingChat  $bookingChat
     * @return \Illuminate\Http\Response
     */
    public function show(BookingChat $bookingChat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingChat  $bookingChat
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingChat $bookingChat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingChat  $bookingChat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingChat $bookingChat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingChat  $bookingChat
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingChat $bookingChat)
    {
        //
    }
}
