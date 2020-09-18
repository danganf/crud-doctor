<?php

namespace App\Models;

use App\app\Models\Doctor;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DoctorSpecialty
 * 
 * @property int $id
 * @property string $doctor_id
 * @property string $specialty_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at 
 * @package App\Models
 * 
 */

class DoctorSpecialty extends Model
{
    protected $table = 'doctor_specialty';

    public function doctor()
	{
		return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
    
    public function specialty()
	{
		return $this->hasOne(Specialty::class, 'specialty_id');
	}
}
