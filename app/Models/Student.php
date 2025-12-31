<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\StudentController;
class Student extends Model
{

    protected $table = 'students'; // غيّره إذا كان اسم الجدول مختلف
    protected $fillable = ['user_id','name','email','course','course_date','degree','image'];
    protected $casts = [
        'course_date' => 'date',
        'degree' => 'string',
    ];
    
    // تعريف علاقة الجدول المستفيدين ب الجدول الجهات 
       public function user()
{
    return $this->belongsTo(User::class);
}
// علاقة جدول المستفيدين بجدول الشهادات واحد الى لكثير 
public function certificates()
{
    return $this->hasMany(Certificate::class);
}
 
}
