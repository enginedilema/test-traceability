<?php

namespace App\Http\Controllers;

use App\Models\SampleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleTypeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SampleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sampleTypes = SampleType::paginate();

        return view('sample-type.index', compact('sampleTypes'))
            ->with('i', ($request->input('page', 1) - 1) * $sampleTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sampleType = new SampleType();

        return view('sample-type.create', compact('sampleType'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleTypeRequest $request): RedirectResponse
    {
        SampleType::create($request->validated());

        return Redirect::route('sample-types.index')
            ->with('success', 'SampleType created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sampleType = SampleType::find($id);

        return view('sample-type.show', compact('sampleType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sampleType = SampleType::find($id);

        return view('sample-type.edit', compact('sampleType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleTypeRequest $request, SampleType $sampleType): RedirectResponse
    {
        $sampleType->update($request->validated());

        return Redirect::route('sample-types.index')
            ->with('success', 'SampleType updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SampleType::find($id)->delete();

        return Redirect::route('sample-types.index')
            ->with('success', 'SampleType deleted successfully');
    }
}
