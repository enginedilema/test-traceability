<?php

namespace App\Http\Controllers;

use App\Models\SampleTypePaaf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleTypePaafRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SampleTypePaafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sampleTypePaafs = SampleTypePaaf::paginate();

        return view('sample-type-paaf.index', compact('sampleTypePaafs'))
            ->with('i', ($request->input('page', 1) - 1) * $sampleTypePaafs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sampleTypePaaf = new SampleTypePaaf();

        return view('sample-type-paaf.create', compact('sampleTypePaaf'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleTypePaafRequest $request): RedirectResponse
    {
        SampleTypePaaf::create($request->validated());

        return Redirect::route('sample-type-paafs.index')
            ->with('success', 'SampleTypePaaf created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sampleTypePaaf = SampleTypePaaf::find($id);

        return view('sample-type-paaf.show', compact('sampleTypePaaf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sampleTypePaaf = SampleTypePaaf::find($id);

        return view('sample-type-paaf.edit', compact('sampleTypePaaf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleTypePaafRequest $request, SampleTypePaaf $sampleTypePaaf): RedirectResponse
    {
        $sampleTypePaaf->update($request->validated());

        return Redirect::route('sample-type-paafs.index')
            ->with('success', 'SampleTypePaaf updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        SampleTypePaaf::find($id)->delete();

        return Redirect::route('sample-type-paafs.index')
            ->with('success', 'SampleTypePaaf deleted successfully');
    }
}
