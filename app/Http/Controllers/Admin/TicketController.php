<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Candidate;
use App\Models\Admin\City;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Auth::user()->tickets()->paginate(12);
        // $tickets = Ticket::where('id', '=', Auth::user()->id)->paginate(12);
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create(String $id)
    {   
        $city = City::find($id);
        $candidates = Candidate::where('city_id', $city->id)->get()->map(function ($candidate) {
            return [
                'label' => $candidate->name,
                'value' => $candidate->id
            ];
        });
    
        return view('admin.tickets.create', compact('candidates', 'city'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'city_id' => 'required|exists:cities,id',
        //     'candidates' => 'required|array',
        //     'candidates.*' => 'exists:candidates,id',
        // ]);
        
        // dd($request->all());
        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->city_id = $request->city_id;
        $ticket->purchase_value = 10;
        $ticket->save();

        $ticket->candidates()->attach($request->candidates);

        // dd($request->all());

        return redirect()->route('tickets.index')->with('success', 'Rifa adquirida com sucesso, acesse o bilhete para efetuar o pagamento e validar sua compra!');
    }

    public function iturama($id)
    {
        $city = City::find($id);
        return view('admin.tickets.create', compact('cities'));
    }
}
