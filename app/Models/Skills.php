<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skills extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =['skill'];
    protected $dates = ['deleted_at'];

    public function announcements(){
        return $this->belongsToMany(Announcements::class, 'announcement_skill');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_skill');
    }
}
