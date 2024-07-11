<?php

namespace App\Http\Controllers;

use App\Models\OriginLab;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OriginLabRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OriginLabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $originLabs = OriginLab::paginate();

        return view('origin-lab.index', compact('originLabs'))
            ->with('i', ($request->input('page', 1) - 1) * $originLabs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $originLab = new OriginLab();

        return view('origin-lab.create', compact('originLab'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OriginLabRequest $request): RedirectResponse
    {
        OriginLab::create($request->validated());

        return Redirect::route('origin-labs.index')
            ->with('success', 'OriginLab created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $originLab = OriginLab::find($id);

        return view('origin-lab.show', compact('originLab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $originLab = OriginLab::find($id);

        return view('origin-lab.edit', compact('originLab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OriginLabRequest $request, OriginLab $originLab): RedirectResponse
    {
        $originLab->update($request->validated());

        return Redirect::route('origin-labs.index')
            ->with('success', 'OriginLab updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        OriginLab::find($id)->delete();

        return Redirect::route('origin-labs.index')
            ->with('success', 'OriginLab deleted successfully');
    }
}
