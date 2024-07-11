<?php

namespace App\Http\Controllers;

use App\Models\SampleReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleReceptionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SampleReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sampleReceptions = SampleReception::paginate();

        return view('sample-reception.index', compact('sampleReceptions'))
            ->with('i', ($request->input('page', 1) - 1) * $sampleReceptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sampleReception = new SampleReception();

        return view('sample-reception.create', compact('sampleReception'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleReceptionRequest $request): RedirectResponse
    {
        SampleReception::create($request->validated());

        return Redirect::route('sample-receptions.index')
            ->with('success', 'SampleReception created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sampleReception = SampleReception::find($id);

        return view('sample-reception.show', compact('sampleReception'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sampleReception = SampleReception::find($id);

        return view('sample-reception.edit', compact('sampleReception'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleReceptionRequest $request, SampleReception $sampleReception): RedirectResponse
    {
        $sampleReception->update($request->validated());

        return Redirect::route('sample-receptions.index')
            ->with('success', 'SampleReception updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SampleReception::find($id)->delete();

        return Redirect::route('sample-receptions.index')
            ->with('success', 'SampleReception deleted successfully');
    }
}
