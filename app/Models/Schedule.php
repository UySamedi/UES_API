<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'day', 'start_time', 'end_time', 'location'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}