<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Message;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CountryStaff;
use App\Models\CategoryStaff;
use Symfony\Component\HttpFoundation\Response;




class RequestController extends Controller
{

    // index --> show user's tickets /requests
    public function index() {
        return view('requests.index');
    }
    // show --> show a ticket /requests/{id}

    public function show(Ticket $ticket) {
        return view('requests.show', [
            'ticket' => $ticket
        ]);
    }

    // create --> create ticket page /request
    public function create() {

            return view('requests.create', [
            'categories' => Category::all(),
        ]);
    }

    // store --> store ticket /request
    public function store(Request $request) {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
            'category' => 'required',
            'quotation' => 'required'
        ]);

        $status = Status::where('name', 'Ongoing')->first();




        $staff = CountryStaff::with(['CategoryStaff' => function($query) {
            $query->where('category_id', $request->category);
        }])->where('country_id', $request->country)
            ->pluck('staff_id');

        $ticket = Ticket::create([
            'title' => $request->subject,
            'content' => $request->content,
            'country_id' => auth()->user()->country_id,
            'phone' => auth()->user()->phone,
            'position' => auth()->user()->position,
            'name' => auth()->user()->company_name,
            'type' => auth()->user()->type->name,
            'activities' => auth()->user()->activity->name,
            'category_id' => $request->category,
            'status_id' => $status->id,
            'author_id' => auth()->user()->id,
            'quotation' => $request->quotation,
        ]);

        if ($staff->isNotEmpty()) {
            $ticket->staff()->attach($staff->implode(', '));
            $ticket->save();
        } else {
            $ticket->staff()->attach('1');
        }

        Message::create([
            'content' => $request->content,
            'author_id' => auth()->user()->id,
            'ticket_id' => $ticket->id
        ]);

        return redirect()->route('requests.show', $ticket->id);
    }
}
