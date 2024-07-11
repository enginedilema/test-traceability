<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SampleTypePaaf
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
class SampleTypePaaf extends Model
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
        return $this->hasMany(\App\Models\SampleReception::class, 'id', 'paaf_sample_type_id');
    }
    
}