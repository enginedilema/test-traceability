<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SampleReception
 *
 * @property $id
 * @property $sample_id
 * @property $patient_name
 * @property $gender
 * @property $age
 * @property $identification_number
 * @property $clinical_information
 * @property $origin_lab_id
 * @property $origin_lab_other
 * @property $requesting_person
 * @property $registration_date
 * @property $exfoliative_sample_type_id
 * @property $paaf_sample_type_id
 * @property $sample_type_other
 * @property $lateralitat
 * @property $technical_id
 * @property $created_at
 * @property $updated_at
 *
 * @property SampleTypePaaf $sampleTypePaaf
 * @property SampleTypeExfoliative $sampleTypeExfoliative
 * @property OriginLab $originLab
 * @property Sample $sample
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SampleReception extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['sample_id', 'patient_name', 'gender', 'age', 'identification_number', 'clinical_information', 'origin_lab_id', 'origin_lab_other', 'requesting_person', 'registration_date', 'exfoliative_sample_type_id', 'paaf_sample_type_id', 'sample_type_other', 'lateralitat', 'technical_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sampleTypePaaf()
    {
        return $this->belongsTo(\App\Models\SampleTypePaaf::class, 'paaf_sample_type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sampleTypeExfoliative()
    {
        return $this->belongsTo(\App\Models\SampleTypeExfoliative::class, 'exfoliative_sample_type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function originLab()
    {
        return $this->belongsTo(\App\Models\OriginLab::class, 'origin_lab_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sample()
    {
        return $this->belongsTo(\App\Models\Sample::class, 'sample_id', 'id');
    }

    public function technicalId()
    {
        return $this->belongsTo(\App\Models\User::class, 'technical_id', 'id');
    }
    
}
