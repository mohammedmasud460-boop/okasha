<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{

 protected $fillable = [
        'student_id', 'frame_id','counter'
       
    ];
//  تعريف علاقة جدول الشهادات بجدول المستفيدين 
            public function Student()
{
    return $this->belongsTo(Student::class);
}

//  علاقة جدول القوالب بجدول الشهادات واحد الى واحد 
         public function Frame()
{
    return $this->hasOne(Frame::class);
}
}
