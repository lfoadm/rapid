<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::orderBy('id', 'asc')->paginate(12);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.tickets.create', compact('cities'));
    }
}
