<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     protected $table = 'employees';
    protected $fillable = ['name','email','phone','address','personal_image','national_id','national_id_image','birthday','position','salary','start_date'];
    
}
