<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarWashBooking;
use App\MyCar;
use StdClass;

class CarWashBookingController extends Controller
{
    public function addcarwashbooking(Request $request){
        $user_id = $request->user()->id;
        $response = new StdClass;
        $status = 400;
        $message = "Something Went Wrong!!!";
        $validatedData = $request->validate([
            'vehicle_id'        => 'required',
            'date'        => 'required',               
            ]);
        $notes = 'No special notes';
        if ($request->notes!=null){
            $notes = $request->notes;
        }
        $mybooking = new CarWashBooking;
        $mybooking->location      = $request->location;
        $mybooking->vehicle_id      = $request->vehicle_id;
        $mybooking->user_id        = $user_id;        
        $mybooking->date        = $request->date;        
        $mybooking->start_time        = $request->start_time;    
        $mybooking->end_time        = $request->end_time;        
        $mybooking->card_id        = $request->card_id;        
        $mybooking->lot_no        = $request->lot_no;        
        $mybooking->fare        = $request->fare;        
        $mybooking->payment_type        = $request->payment_type; 
        $mybooking->notes        = $notes; 
        $mybooking->save();
        if ($mybooking){
                $response->mybooking = $mybooking;
                $status = 200;
                $message = "Car wash booking saved Successfully";
        }   

        $response->status = $status;
        $response->message = $message;
        $response->nexturl = url("/paymentgateway");
        return response()->json($response);     
    }

    public function cancelcarwashbooking(Request $request){
        $user_id = $request->user()->id;
        $response = new StdClass;
        $status = 400;
        $message = "No Booking Found!!!";
       

        $mybooking = CarWashBooking::where('id', $request->wash_id)->where('user_id', $user_id)->first();
        if ($mybooking){
            $mybooking->status      = 'Cancelled';
            $mybooking->update();
            $status = 200;
            $message = "Car wash booking cancelled successfully";
        }   

        $response->status = $status;
        $response->message = $message;
        return response()->json($response);     
    } 

 public function viewMyCarWashBooking(Request $request)
 {
    $response = new StdClass;
    $status = 400;
    $message = "Something Went Wrong!!!";
    $user_id = $request->user()->id;
    $mybooking = CarWashBooking::leftJoin('payment_cards', 'payment_cards.id', '=', 'car_wash_bookings.card_id')->select('car_wash_bookings.*', 'payment_cards.card_no')->where('car_wash_bookings.user_id', $user_id)->get();
    $mylist = array();
    foreach ($mybooking as $key => $value) {
        if ($value->status == 'Completed' || $value->status == 'Cancelled'){
            $vehicle = MyCar::join('carmodels', 'carmodels.id', '=', 'my_cars.car_model')->join('brands', 'brands.id', '=', 'my_cars.car_brand')->where('my_cars.id', $value->vehicle_id)->first();

            if ($vehicle){
                $value->brand_name = $vehicle->brand_name;
                $value->car_image = $vehicle->car_image;
                $value->model_name = $vehicle->model_name;
                array_push($mylist, $value);
            }
        }
    }
    if ($mybooking){
        $status = 200;
        $message = 'Data Processed';
        $response->my_booking = $mylist;
    }
    $response->status = $status;
    $response->message = $message;
    return response()->json($response);

 }

 public function viewMyCarWashScheduleBooking(Request $request)
 {
    $response = new StdClass;
    $status = 400;
    $message = "Something Went Wrong!!!";
    $user_id = $request->user()->id;
    $mybooking = CarWashBooking::leftJoin('payment_cards', 'payment_cards.id', '=', 'car_wash_bookings.card_id')->select('car_wash_bookings.*', 'payment_cards.card_no')->where('car_wash_bookings.user_id', $user_id)->get();
    $mylist = array();;
    $mylist = array();
    foreach ($mybooking as $key => $value) {
        if ($value->status == 'Pending' || $value->status == 'Accepted'){
            $vehicle = MyCar::join('carmodels', 'carmodels.id', '=', 'my_cars.car_model')->join('brands', 'brands.id', '=', 'my_cars.car_brand')->where('my_cars.id', $value->vehicle_id)->first();
            if ($vehicle){
                $value->brand_name = $vehicle->brand_name;
                $value->car_image = $vehicle->car_image;
                $value->model_name = $vehicle->model_name;
                array_push($mylist, $value);
            }
        }
    }
    if ($mybooking){
        $status = 200;
        $message = 'Data Processed';
        $response->my_booking = $mylist;
    }
    $response->status = $status;
    $response->message = $message;
    return response()->json($response);

 }

 public function washListDate(Request $request)
    {
        $washes = CarWashBooking::where('user_id', $request->user()->id)->select('date')->groupBy('date')->get();
        $response = new StdClass;
        $status = 200;
        $message = "Car wash dates not available. Refresh and retry";
        if ($washes){
            $response->wash_dates = $washes;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function washListByDate(Request $request)
    {
        $date = $request->date;
        $washes = CarWashBooking::where('date', $request->date)
                                ->where('user_id', $request->user()->id)
                                ->select('*')
                                ->get();

        $response = new StdClass;
        $status = 200;
        $message = "Car wash not available. Refresh and retry";
        if ($washes){
            $response->wash_dates = $washes;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;
        return response()->json($response);
    }

    public function washListByWeek(Request $request)
    {
        $week = $request->week;
        $start_date = date("d-m-Y", strtotime('monday this week', strtotime($week)));
        $end_date = date("d-m-Y", strtotime('sunday this week', strtotime($week)));
        $washes = CarWashBooking::where('date','>=' ,$start_date)
                                ->where('date','<=' ,$end_date)
                                ->where('user_id', $request->user()->id)
                                ->select('*')
                                ->get();

        $response = new StdClass;
        $status = 200;
        $message = "Car wash not available. Refresh and retry";
        if ($washes){
            $response->wash_dates = $washes;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function washListweek(Request $request)
    {
        $washes = CarWashBooking::where('user_id', $request->user()->id)->select('date')->groupBy('date')->get();
        $response = new StdClass;
        $status = 200;
        $message = "Car wash dates not available. Refresh and retry";
        $weeklist = array();
        if ($washes){
            foreach ($washes as $key => $value) {
                $date = $value->date;
                $time = strtotime($date);
                $week = date('W', $time);
                if (in_array($week, $weeklist) < 1){
                    array_push($weeklist, $week);
                }
            }
            $response->wash_week = $weeklist;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }
}
