<?php

namespace App\Http\Livewire\Registrar;

use App\Models\PaymentRecords;
use App\Models\SchoolFee;
use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class BillingAndPayment extends Component
{
    public $payment_id;
    public $scan_or_search;
    public $student;
    public $payment_records;
    public $student_id;
    public $student_lrn;
    public $date;
    public $amount;
    public $form_of_payment;
    public $total;
    public $balance;
    public $total_tuition_fee;
    public $showFormModal;

    public function mount()
    {
        $this->scan_or_search = '';
        $this->student = null;
        $this->payment_id = null;
        $this->total = 0;
        $this->balance = 0;
        $this->total_tuition_fee = 0;

        $this->showFormModal = false;
    }

    public function getTotalTuitionFee()
    {
        return SchoolFee::sum($this->student['grade_level']);

    }

    public function updated($variable){
        if($variable == 'scan_or_search' || $variable == 'amount'){
            $this->student = $this->searchRecord($this->scan_or_search);
            if(isset($this->student)){
                $this->payment_records = $this->student->payment_records->toArray();
                $this->total_tuition_fee = $this->getTotalTuitionFee();
            }
        }
        // dd($variable);

    }

    public function openPaymentModal()
    {
        $this->resetFields();
        $this->showFormModal = true;
    }

    public function closeRecord()
    {
        $this->showFormModal = false;
        $this->resetFields();
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'date' => 'required',
            'amount' => 'required',
            'form_of_payment' => 'required',
        ]);

        // if ($this->payment_id) {
        //     $model =  PaymentRecords::find($this->payment_id);
        //     $model->update($data);
        // } else {
        //     $this->student::create($valid);
        //     $this->student::updateOrCreate($valid);
        // }
        $this->student->payment_records()->create($valid);

        $this->student->refresh();
        $this->payment_records = $this->student->payment_records->toArray();
        $this->notify('You\'ve save record successfully.');
        $this->showFormModal = false;
    }

    public function searchRecord($lrn){
        return Student::with('payment_records')
            ->where('lrn',$lrn)->first();
    }

    public function setFields($data)
    {
        $this->payment_id = $data['id'];
        $this->student_id = $data['student_id'];
        $this->date = $data['date'];
        $this->amount = $data['amount'];
        $this->form_of_payment = $data['form_of_payment'];
    }

    public function resetFields()
    {
        $this->payment_id = null;
        $this->student_id = '';
        $this->date = date('Y-m-d');
        $this->amount = '';
        $this->form_of_payment = '';
    }

    public function render()
    {
        return view('livewire.registrar.billing-and-payment');
    }
}
