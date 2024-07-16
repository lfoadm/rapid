<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCandidateRequest;
use App\Http\Requests\Admin\UpdateCandidateRequest;
use App\Models\Admin\Candidate;
use App\Models\Admin\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::orderBy('id', 'desc')->paginate(20);
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.candidates.create', compact('cities'));
    }

    public function store(StoreCandidateRequest $request): RedirectResponse
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->storePublicly('images');
        }

        $candidate = Candidate::create([
            'name' => $request->name,
            'surname'=> $request->surname,
            'city_id'=> $request->city_id,
            'number'=> $request->number,
            'acronym'=> $request->acronym,
            'status'=> $request->status,
            'elected'=> false,
            'image' => $path,
        ]);
        
        // dd($candidate);
        // Candidate::create($request->validated());
        return redirect(route('candidates.index'))->with('success', 'Candidato cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $cities = City::all();
        if(!$candidate = Candidate::find($id)) {
            return redirect()->route('candidates.index')->with('message', 'Candidato não encontrado');
        };
        
        return view('admin.candidates.edit', compact('candidate', 'cities'));
    }

    public function update(string $id, UpdateCandidateRequest $request)
    {
        if(!$candidate = Candidate::find($id)) {
            return back()->with('message', 'Candidato não encontrada');
        };
        
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->storePublicly('images');
        }
        
        if(File::exists($candidate->image)) {
            File::delete($candidate->image);
        }
                
        $candidate->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'number' => $request->number,
            'city_id' => $request->city_id,
            'acronym' => $request->acronym,
            'status' => $request->status,
            'image' => $path
        ]);

        return redirect(route('candidates.index'))->with('success', 'Candidato editado com sucesso!');
    }

    public function show(string $id)
    {
        if(!$candidate = Candidate::find($id)) {
            return redirect()->route('candidates.index')->with('message', 'Candidato não encontrada');
        };
        
        return view('admin.candidates.show', compact('candidate'));
    }

    public function destroy(string $id)
    {
        
        if(!$candidate = Candidate::find($id)) {
            return redirect()->route('candidates.index')->with('message', 'Candidato não encontrada');
        };

        if(File::exists($candidate->image)) {
            File::delete($candidate->image);
        }

        $candidate->delete();
        return redirect()->route('candidates.index')->with('message', 'Candidato apagada com sucesso');
    }
}
