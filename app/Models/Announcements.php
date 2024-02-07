<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcements extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['title', 'description', 'company_id', 'image'];
    protected $dates = ['deleted_at'];

    public function company(){
        return $this->belongsTo(Companies::class);
    }

    public function skills(){
        return $this->belongsToMany(Skills::class, 'announcement_skill', 'announcement_id', 'skill_id');
    }
}
