<?php

namespace App\Http\Livewire\Student;

use App\Models\SchoolFee;
use Livewire\Component;

class TuitionFee extends Component
{
    public $fees;
    public $grand_total;
    public function mount()
    {
        $this->grand_total  = 0;
        $this->fees = SchoolFee::select('name','kinder_pre_school')->get();
    }
    public function render()
    {
        return view('livewire.student.tuition-fee');
    }
}
