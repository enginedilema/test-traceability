<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Status;
use App\Models\SampleType;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $samples = Sample::paginate();

        return view('sample.index', compact('samples'))
            ->with('i', ($request->input('page', 1) - 1) * $samples->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sample = new Sample();
        $statuses = Status::all();
        $sampleTypes = SampleType::all();

        return view('sample.create', compact('sample', 'statuses', 'sampleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleRequest $request): RedirectResponse
    {
        Sample::create($request->validated());

        return Redirect::route('samples.index')
            ->with('success', 'Sample created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sample = Sample::find($id);

        return view('sample.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sample = Sample::find($id);
        $statuses = Status::all();
        $sampleTypes = SampleType::all();

        return view('sample.edit', compact('sample', 'statuses', 'sampleTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleRequest $request, Sample $sample): RedirectResponse
    {
        $sample->update($request->validated());

        return Redirect::route('samples.index')
            ->with('success', 'Sample updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Sample::find($id)->delete();

        return Redirect::route('samples.index')
            ->with('success', 'Sample deleted successfully');
    }
}
