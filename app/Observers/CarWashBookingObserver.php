<?php

namespace App\Observers;

use App\CarWashBooking;
use Carbon\Carbon;

class CarWashBookingObserver
{
    /**
     * Handle the car wash booking "created" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function retrieved(CarWashBooking $carWashBooking)
    {
        $end_time = Carbon::parse($carWashBooking->end_time);
        if($end_time->lt(Carbon::now()) && $carWashBooking->status == "Pending")
        {
            MyCar::where('id', $carWashBooking->vehicle_id)->update(['is_booked' => false]);
            $carWashBooking->status = 'Expired';
            $carWashBooking->save();
        }elseif ($carWashBooking->status == "Expired" && $carWashBooking->wash_completed_date != Null) {
            MyCar::where('id', $carWashBooking->vehicle_id)->update(['is_booked' => false]);
            $carWashBooking->status = 'Completed';
            $carWashBooking->save();
        }
    }
    /**
     * Handle the car wash booking "created" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function created(CarWashBooking $carWashBooking)
    {
        //
    }

    /**
     * Handle the car wash booking "updated" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function updated(CarWashBooking $carWashBooking)
    {
        //
    }

    /**
     * Handle the car wash booking "deleted" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function deleted(CarWashBooking $carWashBooking)
    {
        //
    }

    /**
     * Handle the car wash booking "restored" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function restored(CarWashBooking $carWashBooking)
    {
        //
    }

    /**
     * Handle the car wash booking "force deleted" event.
     *
     * @param  \App\CarWashBooking  $carWashBooking
     * @return void
     */
    public function forceDeleted(CarWashBooking $carWashBooking)
    {
        //
    }
}
