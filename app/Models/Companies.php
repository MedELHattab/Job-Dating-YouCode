<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    
    protected $fillable =['name', 'description', 'location'];

    public function announcements(){
        return $this->hasMany(Announcements::class, 'company_id', 'id');
    }
}
