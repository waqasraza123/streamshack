<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Order;
use App\Models\Organiser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showTicketsBought(){

        $user = auth()->user();

        $attendees = Attendee::whereAttendeeId($user->id)->get();

        return view('Customers.customer-dashboard', compact('attendees'));
    }
}
