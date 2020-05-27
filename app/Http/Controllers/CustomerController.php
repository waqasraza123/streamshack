<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Order;
use App\Models\Organiser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function showTicketsBought(){

        $user = auth()->user();

        $attendees = Attendee::whereAttendeeId($user->id)->get();
        $paymentStatus = DB::table('session_temp')->where('user_id', auth()->user()->id)->first()->payment_status;
        session()->put('message', 'Your payment has been ' . $paymentStatus);
        return view('Customers.customer-dashboard', compact('attendees'))->with('message', $paymentStatus);
    }

}
