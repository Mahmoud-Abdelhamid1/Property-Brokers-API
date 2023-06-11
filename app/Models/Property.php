<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'broker_id','address','property_type','city','zip_code','description','build_year'
    ];

    /**
     * Get the charactristic associated with the property
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function charactristic(): HasOne
    {
        return $this->hasOne(PropertyCharacteristic::class);
    }
}
