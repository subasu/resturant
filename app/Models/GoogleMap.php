<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleMap extends Model
{
    protected $table="google_Maps";
    protected $fillable=['iframe_tag','active'];
}
