<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['school_name','box_address','location','vision','motto','logo'];
}
