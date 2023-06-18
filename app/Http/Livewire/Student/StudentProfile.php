<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class StudentProfile extends Component
{
    public $student;

    public function mount()
    {
        $user_id = auth()->user()->id;
        $this->student = Student::where('user_id',$user_id)->first();
    }

    public function render()
    {
        return view('livewire.student.student-profile');
    }
}
