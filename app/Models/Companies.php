<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable =['name', 'description', 'location', 'image'];

    public function announcements(){
        return $this->hasMany(Announcements::class, 'company_id', 'id');
    }

    public static function boot(){
        parent::boot();
        static::deleting(function(Companies $companies){
            $companies->announcements()->delete();
        });
    }
}
