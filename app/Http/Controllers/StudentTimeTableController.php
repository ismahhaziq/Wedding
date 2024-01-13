<?php

namespace App\Http\Controllers;

use App\Models\TimeTable;
use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\Subject;
use App\Models\Day;
use App\Models\Group;
use DB;
use Hash; 

class StudentTimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timetables = Timetable::with('day', 'subject', 'hall', 'group')
        ->get();                      //^^^^^^
                                      //ikut dalam Timetable Model
        
    

        return view('timetables.index',compact('timetables'));

    }

    public function create()
    {
        $days = Day::pluck('day_name', 'id');
        //^^^
        //ni declaration
        $halls = Hall::pluck('lecture_hall_name', 'id');
                            //^^^^^^^^^^^^^^^^^
                            //parameter sini berfungsi untuk call column yang ada kat database

        $subjects = DB::table('subjects')
        ->select('id', DB::raw("CONCAT(subjects.subject_code,' - ',subjects.subject_name) AS full_name"))
        ->pluck('full_name', 'id');

        $groups = Group::pluck('part', 'id');
                //^^^
                //ni Model
        return view('timetables.create', compact('days', 'subjects', 'halls', 'groups'));
    }

    public function store(Request $request)
    {
        /*DB::table('timetables')->insert([
            'users_id' => auth()->user()->id,
            'days_id' => $request->day_id,
            'subjects_id' => $request->subject_id,
            'halls_id' => $request->hall_id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
           ]);*/

           TimeTable::create([
            'users_id' => auth()->user()->id,
            'days_id' => $request->day_id,
            'subjects_id' => $request->subject_id,
            'halls_id' => $request->lecture_hall_id,
            'groups_id' => $request->group_id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
           ]);
           //^^^^^^^^                     
           //'column database' => $request->'name dari form' 
      
              return redirect()->route('timetables.index')
                              ->with('success','Timetables created successfully.');
    }


    public function show(TimeTable $timetable)
    {
        return view('timetables.show',compact('timetable'));
    }



    public function edit(TimeTable $timetable)
    {
       //dd($timetable);
       
        $days = Day::pluck('day_name', 'id');

        $halls = Hall::pluck('lecture_hall_name', 'id');
        
        $subjects = DB::table('subjects')
        ->select('id', DB::raw("CONCAT(subjects.subject_code,' - ',subjects.subject_name) AS full_name"))
        ->pluck('full_name', 'id');
 
        
        $groups = Group::pluck('part', 'id');

        //dd($timetable);

        return view('timetables.edit',compact('days', 'subjects', 'halls', 'groups', 'timetable'));

    }


    public function update(Request $request, TimeTable $timetable)
    {
        $timetable->update([
            'users_id' => auth()->user()->id,
            'days_id' => $request->day_id,
            'subjects_id' => $request->subject_id,
            'halls_id' => $request->lecture_hall_id,
            'groups_id' => $request->group_id,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
           ]);

        return redirect()->route('timetables.index')
                        ->with('success','Timetables updated successfully');
    }

    public function destroy(TimeTable $timetable)
    {
        $timetable->delete();
  
        return redirect()->route('timetables.index')
                        ->with('success','Timetabe deleted successfully');
    }
}
