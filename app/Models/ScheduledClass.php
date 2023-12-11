<?php

namespace App\Models;

use App\Models\ClassType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduledClass extends Model
{
    use HasFactory;
    protected $guareded = null;
    protected $fillable = ['class_type_id','date_time','instructor_id'];
    protected $casts = [
        'date_time' => 'datetime'
    ];


    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id');
    }


    public function classType(){
        return $this->belongsTo(ClassType::class);
    }
}
