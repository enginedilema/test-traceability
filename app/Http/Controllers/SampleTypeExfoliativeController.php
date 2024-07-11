<?php

namespace App\Http\Controllers;

use App\Models\SampleTypeExfoliative;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleTypeExfoliativeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SampleTypeExfoliativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sampleTypeExfoliatives = SampleTypeExfoliative::paginate();

        return view('sample-type-exfoliative.index', compact('sampleTypeExfoliatives'))
            ->with('i', ($request->input('page', 1) - 1) * $sampleTypeExfoliatives->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sampleTypeExfoliative = new SampleTypeExfoliative();

        return view('sample-type-exfoliative.create', compact('sampleTypeExfoliative'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleTypeExfoliativeRequest $request): RedirectResponse
    {
        SampleTypeExfoliative::create($request->validated());

        return Redirect::route('sample-type-exfoliatives.index')
            ->with('success', 'SampleTypeExfoliative created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sampleTypeExfoliative = SampleTypeExfoliative::find($id);

        return view('sample-type-exfoliative.show', compact('sampleTypeExfoliative'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sampleTypeExfoliative = SampleTypeExfoliative::find($id);

        return view('sample-type-exfoliative.edit', compact('sampleTypeExfoliative'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleTypeExfoliativeRequest $request, SampleTypeExfoliative $sampleTypeExfoliative): RedirectResponse
    {
        $sampleTypeExfoliative->update($request->validated());

        return Redirect::route('sample-type-exfoliatives.index')
            ->with('success', 'SampleTypeExfoliative updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SampleTypeExfoliative::find($id)->delete();

        return Redirect::route('sample-type-exfoliatives.index')
            ->with('success', 'SampleTypeExfoliative deleted successfully');
    }
}
