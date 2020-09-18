<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 * 
 * @property int $id
 * @property string $name
 * @property string $crm
 * @property string $phone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at 
 * @package App\Models
 * 
 */

class Doctor extends Model
{
    protected $table = 'doctor';

    protected $hidden = array('pivot');

    public function specialtys()
    {
        return $this->belongsToMany(specialtys::class, 'doctor_specialty', 'doctor_id', 'specialty_id');
    }
}
