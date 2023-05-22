<?php

namespace App\Http\Livewire\Registrar;

use App\Models\Student;
use Livewire\Component;

class EnrollmentStudentView extends Component
{
    public $student;

    public function mount($user_id, $id){
        $this->student = Student::find($id);
    }

    public function render()
    {
        return view('livewire.registrar.enrollment-student-view');
    }
}
