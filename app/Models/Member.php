<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
   protected $fillable = [
    'photo','first_name','middle_name','last_name','suffixes',
    'parents_name','immediate_contact','address','geography',
    'country','phone','email','facebook','birthday','age',
    'role','representative_type','representative_name',
    'beneficiary_1','beneficiary_2','beneficiary_3',
    'beneficiary_4','beneficiary_5','beneficiary_6',
];

}
