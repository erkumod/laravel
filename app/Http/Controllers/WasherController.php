<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\WasherDetails;
use App\CarWashBooking;
use App\PromoStamps;
use App\Profile;
use App\MyCar;
use StdClass;
use Config;
use Image;
use File;


class WasherController extends Controller
{
    public function checkstatus(Request $request)
    {
    	$washerdetails = WasherDetails::where('user_id', $request->user()->id)->first();
    	$response = new StdClass;
        $status = 200;
        $message = "User not registered as washer.";
        $washer = 0;
        if ($washerdetails){
            $status = 200;
            $washer = 1;
            $message = "User is registered and approved";
        }
        $response->status = $status;
        $response->washer = $washer;
        $response->message = $message;

        return response()->json($response);
    }

    public function availableWashes(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "User not registered as washer.";
        // $wash = CarWashBooking::where('status', 'Accepted')->where('accepted_by', '0')->first();
        $wash = CarWashBooking::
                                // join('users', 'users.id', '=', 'car_wash_bookings.user_id')
                                // ->join('my_cars','my_cars.id','car_wash_bookings.vehicle_id')
                                // ->join('carmodels','carmodels.id','my_cars.car_model')
                                // ->select('users.name as user_name','car_wash_bookings.*','carmodels.*')
                                // ->
                                where('car_wash_bookings.status', 'Accepted')->where('accepted_by', '0')->first();
        if ($wash){
            $message = "No Wash available";
        }
        else{
            Config::set('lat', $request->lat);
            Config::set('lon', $request->lon);
            // $washes = CarWashBooking::where('status', 'Pending')->where('accepted_by', '0')->get();
            $washes = CarWashBooking::
            where('car_wash_bookings.status', 'Pending')->where('accepted_by', '0')->orderBy('updated_at','desc')->get()->where('status','Pending');
            // join('users', 'users.id', '=', 'car_wash_bookings.user_id')
            // ->join('my_cars','my_cars.id','car_wash_bookings.vehicle_id')
            // ->join('carmodels','carmodels.id','my_cars.car_model')
            // ->select('users.name as user_name','car_wash_bookings.*','carmodels.*')
            // ->
            if ($washes){
                $response->request_wash = $washes;
                $status = 200;
                $message = "Result fetched successfully";

            }
        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function acceptedWash(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "User not registered as washer.";
        Config::set('lat', $request->lat);
        Config::set('lon', $request->lon);
        $washes = CarWashBooking::
        where('accepted_by', $request->user()->id)->whereIn('status', ['Accepted','Started'])->orderBy('updated_at','desc')->get();
        // join('users', 'users.id', '=', 'car_wash_bookings.user_id')->join('my_cars','my_cars.id','car_wash_bookings.vehicle_id')
        // ->join('carmodels','carmodels.id','my_cars.car_model')
        // ->select('users.name as user_name','my_cars.*','carmodels.*','car_wash_bookings.*')
        // ->where('car_wash_bookings.status','Accepted')
        // ->
        // $washes = CarWashBooking::where('accepted_by', $request->user()->id)->get();
        if ($washes){
            $response->accepted_wash = $washes;
            $status = 200;
            $message = "Result fetched successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function acceptedWashInfo(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "User not registered as washer.";

        $washes = CarWashBooking::leftJoin('users', 'car_wash_bookings.user_id', '=', 'users.id')->where('accepted_by', $request->user()->id)->select('car_wash_bookings.*', 'users.name')->where('car_wash_bookings.id', $request->wash_id)->first();
        if ($washes){
            $response->washing_info = $washes;
            $status = 200;
            $message = "Result fetched successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function acceptWash(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "Car wash not accepted. Refresh and retry";

        $washes = CarWashBooking::where('id', $request->wash_id)->first();
        if ($washes && isset($washes->accepted_by) && $washes->accepted_by == '0'){
            $washes->accepted_by = $request->user()->id;
            $washes->status = 'Accepted';
            $washes->update(); 
            $response->accepted_wash = $washes;
            $status = 200;
            $message = "Accepted successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function startWash(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "Car wash not accepted. Refresh and retry";

        $washes = CarWashBooking::where('id', $request->wash_id)->where('status', 'Accepted')->where('accepted_by', $request->user()->id)->first();
        if ($washes){
            $washes->status = 'Started';
            $washes->update(); 
            $response->accepted_wash = $washes;
            $status = 200;
            $message = "Accepted successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function completeWash(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "Car wash not accepted. Refresh and retry";

        $washes = CarWashBooking::where('id', $request->wash_id)->where('status', 'Started')->where('accepted_by', $request->user()->id)->first();
        if ($washes){
            $washes->status = 'Completed';
            $washes->update(); 
            $response->accepted_wash = $washes;
            $profile = Profile::where('user_id',$washes->user_id)->first();
            if($profile->unrewarded_booking == 8){
                $data = array('type'=>"Mini7");
                $data['user_id'] = $request->user()->id;
                $data['code'] = Str::random(8);
                $data['type'] = 'valid';
                $data['expired_at'] =  Carbon::now()->addMonths(6);
                $stamp = PromoStamps::create($data);
                $profile->unrewarded_booking = 0;
                $profile->save();
            }

            $profile->save();
            $status = 200;
            $message = "Completed successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function cancelWash(Request $request)
    {
        $response = new StdClass;
        $status = 200;
        $message = "Car wash not accepted. Refresh and retry";

        $washes = CarWashBooking::where('id', $request->wash_id)->where('status', '!=' ,'Started')->where('accepted_by', $request->user()->id)->first();
        if ($washes){
            $washes->status = 'Pending';
            $washes->accepted_by = '0';
            $washes->cancel_message = $request->cancel_message;
                if($request->file('cancel_image')){
                    $cancel_image = $request->file('cancel_image');
                    $path = public_path().'/cancel_image/'.$request->wash_id."/";
                    File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                    $path = public_path();
                    $filename = '/cancel_image/'.$request->wash_id."/".time() . '.' . $cancel_image->getClientOriginalExtension();
                    Image::make($cancel_image)->resize(300, 300)->save(public_path($filename));
                    $washes->cancel_image =$filename;
                }
            $washes->update(); 
            $response->accepted_wash = $washes;
            $status = 200;
            $message = "Canceld successfully";

        }
        $response->status = $status;
        $response->message = $message;

        return response()->json($response);

    }

    public function washListDate(Request $request)
    {
        $washes = CarWashBooking::where('accepted_by', $request->user()->id)->select('date')->groupBy('date')->get();
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
                                ->where('accepted_by', $request->user()->id)                               
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
        $year = $request->year;
        // $start_date = date("d-m-Y", strtotime('monday this week', strtotime($week)));
        // $end_date = date("d-m-Y", strtotime('sunday this week', strtotime($week)));
        $week_start = new \DateTime();
        $week_start->setISODate($year,$week);
        $start_date =  $week_start->format('d-M-Y');

        $week_end = new \DateTime();
        $week_end->setISODate($year,$week);
        $end_date =  $week_end->format('d-M-Y');
        $washes = CarWashBooking::where('date','>=' ,$start_date)
                                ->where('date','<=' ,$end_date)
                                ->where('accepted_by', $request->user()->id)
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
        $washes = CarWashBooking::where('accepted_by', $request->user()->id)->select('date')->groupBy('date')->get();
        $response = new StdClass;
        $status = 200;
        $message = "Car wash dates not available. Refresh and retry";
        $weeklist = array();
        if ($washes){
            foreach ($washes as $key => $value) {
                $date = $value->date;
                $time = strtotime($date);
                $obj = new StdClass;
                $week = date('W', $time);
                $year = date('Y', $time);
                $obj->week = $week;
                $obj->year = $year;
                if (in_array($week, $weeklist) < 1){
                    array_push($weeklist, $obj);
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


    public function viewwasherdetails($id, Request $request)
    {

        $user_id = $id;
        $washerdetails = WasherDetails::join('users', 'users.id', '=', 'washer_details.user_id')->select('users.name','users.mobile','users.email', 'users.created_at', 'washer_details.*')->where('washer_details.user_id', $user_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        
        return view('admin.washer_details', compact('washerdetails', 'profile'));
    }

    public function approvewasherdetails($id, Request $request)
    {

        $user_id = $id;
        $washerdetails = WasherDetails::join('users', 'users.id', '=', 'washer_details.user_id')->select('users.name','users.mobile','users.email', 'users.created_at', 'washer_details.*')->where('washer_details.id', $user_id)->first();
        if ($washerdetails->status == 'Deactive'){
            $washerdetails->status = "Active";
            $washerdetails->update();
            return redirect('/admin/washerlists');
        }
        else{
            return redirect('/admin/washer/'.$id);
        }
        
       
    }

    public function bank_details(Request $request)
    {
        $user_id = $request->user()->id;
        $washerdetails = WasherDetails::join('users', 'users.id', '=', 'washer_details.user_id')->select('users.name','users.mobile','users.email', 'users.created_at', 'washer_details.*')->where('washer_details.user_id', $user_id)->first();
        $response = new StdClass;
        $status = 200;
        
        $message = "Bank details not found";
        if ($washerdetails){
            $washerdetails->bank_name = "DCB Bank";
            $washerdetails->bank_logo = "DCB Bank";
            $washerdetails->ac_name = "Washer Name";
            $response->washer_details = $washerdetails;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;
        return response()->json($response);

    }


    public function savebank_details(Request $request)
    {
        $user_id = $request->user()->id;
        $washerdetails = WasherDetails::where('user_id', $user_id)->first();
        if ($washerdetails){
            $washerdetails->bank_ac_no      = $request->bank_ac_no;
            $washerdetails->ac_name     = $request->ac_name;
            // $washerdetails->ac_type     = $request->ac_type;
            $washerdetails->ifsc_code       = $request->ifsc_code;
            $washerdetails->update();
        }
        // else{
            // $washerdetails->bank_ac_no      = $request->bank_ac_no;
            // $washerdetails->ac_name     = $request->ac_name;
            // $washerdetails->ac_type     = $request->ac_type;
            // $washerdetails->ifsc_code       = $request->ifsc_code;
            // $washerdetails->save();

        // }
        $response = new StdClass;
        $status = 200;
        
        $message = "Bank details not found";
        if ($washerdetails){
            $response->washer_details = $washerdetails;
            $message = "data retrieved successfully";
            $status = 200;
        }
        $response->status = $status;
        $response->message = $message;
        return response()->json($response);

    }

    public function vehicle_pic(Request $request)
    {
        $response = new StdClass;
        $status = 400;
        $message = "Something Went Wrong!!!";
        $user_id = $request->user()->id;
        $id = $request->car_id;
        $mycar = MyCar::where('my_cars.id', $id)->first();
        if ($mycar){
            $status = 200;
            $message = 'Data Processed';
            $response->my_car = $mycar;
        }
        $response->status = $status;
        $response->message = $message;
        return response()->json($response);
    }
}
