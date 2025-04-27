<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    protected $fillable=['name','image','address','contact_info','created_by'];

    public function floors(){
        return $this->hasMany(Floor::class);
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
