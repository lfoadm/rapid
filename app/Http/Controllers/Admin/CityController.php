<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use App\Models\Admin\City;
use Illuminate\Http\RedirectResponse;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'asc')->paginate(6);
        return view('admin.cities.index', compact('cities'));
    }

    public function candidates(City $city)
    {
        return response()->json($city->candidates);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(StoreCityRequest $request): RedirectResponse
    {
        City::create($request->validated());
        return redirect(route('cities.index'))->with('success', 'Cidade cadastrada com sucesso!');
    }

    public function edit(string $id)
    {
        if(!$city = City::find($id)) {
            return redirect()->route('cities.index')->with('message', 'Cidade não encontrado');
        };
        
        return view('admin.cities.edit', compact('city'));
    }

    public function update(string $id, UpdateCityRequest $request)
    {
        if(!$city = City::find($id)) {
            return back()->with('message', 'Cidade não encontrada');
        };

        $city->update($request->only([
            'name', 'state', 'status'
        ]));

        return redirect(route('cities.index'))->with('success', 'Cidade editada com sucesso!');
    }

    public function show(string $id)
    {
        if(!$city = City::find($id)) {
            return redirect()->route('cities.index')->with('message', 'Cidade não encontrada');
        };
        
        return view('admin.cities.show', compact('city'));
    }

    public function destroy(string $id)
    {
        
        if(!$city = City::find($id)) {
            return redirect()->route('cities.index')->with('message', 'Cidade não encontrada');
        };

        $city->delete();
        return redirect()->route('cities.index')->with('message', 'Cidade apagada com sucesso');
    }
}
