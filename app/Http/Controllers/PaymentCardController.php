<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentCard;
use StdClass;

class PaymentCardController extends Controller
{
    public function addMyCard(Request $request){
        $user_id = $request->user()->id;
        $response = new StdClass;
        $status = 400;
        $message = "Something Went Wrong!!!";
        $validatedData = $request->validate([
            'card_no'        => 'required',
            'expiry_month'        => 'required',
            'expiry_year'        => 'required',
            'name'        => 'required',
               
        ]);       

        $mycard = new PaymentCard;
        $mycard->card_no      = $request->card_no;
        $mycard->expiry_month      = $request->expiry_month;
        $mycard->status        = $request->status;
        $mycard->expiry_year      = $request->expiry_year;
        $mycard->user_id        = $user_id;    
		$card = PaymentCard::where([
			['user_id', '=', $user_id],
			['primary', '=', true]
		])->get();

		$mycard->primary = filter_var($request->primary, FILTER_VALIDATE_BOOLEAN);
		if ($mycard->primary){
			$mycard->primary        = $mycard->primary;        
		}

		if($card && count($card) > 0 && $mycard->primary == true){
			PaymentCard::where([
				['user_id', '=', $user_id],
				['primary', '=', true]
			])->update(['primary' => false]);
			$mycard->primary        = true;        
		}
        $mycard->type        = $request->type;        
        $mycard->name        = $request->name;        
        $mycard->save();


        if ($mycard){
                $response->mycards = $mycard;
                $status = 200;
                $message = "Card information saved Successfully";

        }   

        $response->status = $status;
        $response->message = $message;
        return response()->json($response);     
	}

	public function editMyCard(Request $request){
	    $user_id = $request->user()->id;
	    $response = new StdClass;
	    $status = 400;
	    $message = "Something Went Wrong!!!";
	    $validatedData = $request->validate([
	        'card_no'        => 'required',
            'expiry_month'        => 'required',
            'expiry_year'        => 'required',
            'name'        => 'required',
	        ]);

	    

	    $mycard = PaymentCard::where('user_id', $user_id)->where('id', $request->card_id)->first();
	    if ($mycard){
		    $mycard->card_no      = $request->card_no;
	        $mycard->expiry_month      = $request->expiry_month;
	        $mycard->expiry_year      = $request->expiry_year;
	        $mycard->type        = $request->type;        
	        $mycard->user_id        = $user_id;  
	        $mycard->status        = $request->status;
	        $mycard->name        = $request->name;
		    $mycard->update();
	    }
        else{
            $message = "This card is not yours";
        }

	    if ($mycard){
	            $response->mycards = $mycard;
	            $status = 200;
	            $message = "Card information saved Successfully";

	    }   

	    $response->status = $status;
	    $response->message = $message;
	    return response()->json($response);     
	}  
	public function deleteMyCard(Request $request){
	    $user_id = $request->user()->id;
	    $response = new StdClass;
	    $status = 400;
	    $message = "Something Went Wrong!!!";
	    
	    

	    $mycard = PaymentCard::where('user_id', $user_id)->where('id', $request->card_id)->delete();
	    // $mycard->update();


	    if ($mycard){
	            $response->mycard = $mycard;
	            $status = 200;
	            $message = "Car information deleted Successfully";

	    }   

	    $response->status = $status;
	    $response->message = $message;
	    return response()->json($response);     
	}

	public function viewMycard(Request $request)
	{
	$response = new StdClass;
	$status = 400;
	$message = "Something Went Wrong!!!";
	$user_id = $request->user()->id;
	$mycard = PaymentCard::where('user_id', $user_id)->orderBy('status', 'Desc')->get();
	if ($mycard){
	    $status = 200;
	    $message = 'Data Processed';
	    $response->my_cards = $mycard;
	}
	$response->status = $status;
	$response->message = $message;
	return response()->json($response);

	}
}
