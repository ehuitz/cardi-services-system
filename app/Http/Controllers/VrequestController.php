<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Status;
use App\Models\Vrequest;
use App\Models\Message;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CountryStaff;
use App\Models\CategoryStaff;


class VrequestController extends Controller
{
    // index --> show user's requests /vrequests
    public function index() {
        return view('vrequests.index');
    }
    // show --> show a request /vrequests/{id}

    public function show(Vrequest $vrequest) {
        return view('vrequests.show', [
            'vrequest' => $vrequest
        ]);
    }

    // create --> create request page /request
    public function create() {

     // dd(Country::where('type', 'LIKE' ,'External')->get());

        return view('vrequests.create');
    }

    // store --> store request /request
    public function store(Request $vrequest) {
        $vrequest->validate([
            'days' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'notes' => 'required|string',
        ]);

        // $status = Status::where('name', 'Ongoing')->first();



        $vrequest = Vrequest::create([
            'staff_id' => auth()->user()->id,
            'days' => $vrequest->days,
            'date_start' => $vrequest->date_start,
            'date_end' => $vrequest->date_end,
            'notes' => $vrequest->notes,
            'eligible' => null,
            'year_eligible' => 16,
            'brought_forward' => 0,
            'previously_taken' => 0,
            'current_eligible' => 1,
            'balance_forward' => 0,
        ]);

        return redirect()->route('vrequests.show', $vrequest->id);
    }
}
