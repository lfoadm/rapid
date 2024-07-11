<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCandidateRequest;
use App\Http\Requests\Admin\UpdateCandidateRequest;
use App\Models\Admin\Candidate;
use App\Models\Admin\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        Candidate::create($request->validated());
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

        $candidate->update($request->only([
            'name',
            'surname',
            'number',
            'city_id',
            'acronym',
            'status',
            'image',
        ]));

        return redirect(route('candidates.index'))->with('success', 'Candidato editado com sucesso!');
    }

}
