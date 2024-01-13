<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Day;
use App\Models\Hall;
use App\Models\Group;

class TimeTable extends Model
{
    public $table = 'timetables';

    protected $fillable = [
        'users_id', 'subjects_id', 'days_id', 'halls_id', 'groups_id', 
        'time_from', 'time_to',
    ];

    protected $casts = [
        'time_from' => 'datetime',
        'time_to' => 'datetime',
    ];

   

    public function hall(){
        return $this->belongsTo(Hall::class, 'halls_id');
    }                                     // ^^^^^^^^^
                                          //ikut fillable, kira column yang kita create dalam database    

    public function subject(){
        return $this->belongsTo(Subject::class, 'subjects_id');
    }

    public function day(){
        return $this->belongsTo(Day::class, 'days_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'groups_id');
    }
}
