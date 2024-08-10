<?php

namespace App\Http\Controllers;

use App\Models\SampleReception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SampleReceptionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\OriginLab;
use App\Models\Sample;
use App\Models\SampleTypeExfoliative;
use App\Models\SampleTypePaaf;
use Carbon\Carbon;

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
        $originLabs = OriginLab::all();
        $sampleTypeExfoliatives = SampleTypeExfoliative::all();
        $sampleTypePaafs = SampleTypePaaf::all();

        return view('sample-reception.create', compact('sampleReception', 'originLabs', 'sampleTypeExfoliatives', 'sampleTypePaafs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleReceptionRequest $request): RedirectResponse
    {
        $request->registration_date = Carbon::now();
        $request->sample_id = Sample::where('qr_code', $request->sample_qr)->first()->id;

        if($request->sample_type_id == 'exfoliativa'){
            $request->exfoliative_sample_type_id = null;
        }else{
            $request->paaf_sample_type_id = null;
        }

        SampleReception::create([
            'registration_date' => $request->registration_date,
            'sample_id' => Sample::where('qr_code', $request->sample_qr)->first()->id,
            'sample_type_id' => $request->sample_type_id,
            'exfoliative_sample_type_id' => $request->exfoliative_sample_type_id,
            'paaf_sample_type_id' => $request->paaf_sample_type_id,
            'origin_lab_id' => $request->origin_lab_id,
            'exfoliative_sample_type_id' => $request->exfoliative_sample_type_id,
            'paaf_sample_type_id' => $request->paaf_sample_type_id,
            'origin_lab_id' => $request->origin_lab_id,
            'technical_id' => $request->technical_id,
            'patient_name' => $request->patient_name,
            'gender' => $request->gender,
            'age' => $request->age,
            'clinical_information' => $request->clinical_information,
            
        ]);

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
