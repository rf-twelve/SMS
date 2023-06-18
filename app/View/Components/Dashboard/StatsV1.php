<?php

namespace App\View\Components\Dashboard;

use App\Models\Doc;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\View\Component;

class StatsV1 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.stats-v1',[
            'student_count' => Student::count(),
            'teacher_count' => Teacher::count(),
        ]);
    }
}
