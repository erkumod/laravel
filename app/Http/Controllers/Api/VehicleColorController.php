<?php

namespace App\Http\Controllers\Api;

use App\VehicleColor;
use App\VehicalType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VehicleColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = VehicleColor::get();
    	$status = 400;
        $message = "Data not found";
        $response = [];
        if($vehicle){
            $response['vehicles'] = $vehicle;
            $status = 200;
    		$message = 'Data retrieved successfully';
        }
        $response = (object) $response;
        $response->status = $status;
    	$response->message = $message;
        return response()->json($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function type()
    {
        $vehicle = VehicalType::get();
    	$status = 400;
        $message = "Data not found";
        $response = [];
        if($vehicle){
            $response['vehicles'] = $vehicle;
            $status = 200;
    		$message = 'Data retrieved successfully';
        }
        $response = (object) $response;
        $response->status = $status;
    	$response->message = $message;
        return response()->json($response);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
