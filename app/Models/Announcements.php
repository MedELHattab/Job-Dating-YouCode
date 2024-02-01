<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    protected $fillable=['title', 'description', 'company_id'];

    public function company(){
        return($this->belongsTo(Companies::class));
    }
}
