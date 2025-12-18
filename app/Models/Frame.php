<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{

    

    protected $table = 'frame'; // لأن اسم الجدول frem (بدون s)
    protected $fillable = ['name', 'image', 'counter']; // عدّل حسب أعمدة جدولك


 
    // تعريف علاقة جدول القوالب بجدول الشهادات 

            public function Certificate()
{
    return $this->belongsTo(Certificate::class);
 
}
}
