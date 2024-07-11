<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SampleTypeExfoliative
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property SampleReception[] $sampleReceptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class SampleTypeExfoliative extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sampleReceptions()
    {
        return $this->hasMany(\App\Models\SampleReception::class, 'id', 'exfoliative_sample_type_id');
    }
    
}
