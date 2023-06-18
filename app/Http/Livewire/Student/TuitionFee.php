<?php

namespace App\Http\Livewire\Student;

use App\Models\SchoolFee;
use App\Models\Student;
use Livewire\Component;

class TuitionFee extends Component
{
    public $fees;
    public $student;
    public $total_fees;
    public $total_payment;
    public $total_balance;
    public function mount()
    {
        $user_id = auth()->user()->id;
        $this->student = Student::with('payment_records')
                        ->where('user_id',$user_id)->first();
        $this->fees = SchoolFee::select('name',$this->student['grade_level'].' as amount')->get();
        $this->total_fees = $this->fees->sum('amount');
        $this->total_payment = $this->student->payment_records->sum('amount');
        $this->total_balance = $this->total_fees - $this->total_payment;

    }
    public function render()
    {
        return view('livewire.student.tuition-fee');
    }
}
