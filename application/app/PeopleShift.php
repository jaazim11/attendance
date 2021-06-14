<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeopleShift extends Model
{
    protected $fillable = ['reference', 'sunday_shift', 'monday_shift', 'tuesday_shift', 'wednesday_shift', 'thursday_shift', 'friday_shift', 'saturday_shift'];
}
