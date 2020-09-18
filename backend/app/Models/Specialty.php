<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialty
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at 
 * @package App\Models
 * 
 */

class Specialty extends Model
{
    protected $table = 'specialty';
}
