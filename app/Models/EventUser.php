<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    //
    public $fillable=["user_id","event_id"];
}