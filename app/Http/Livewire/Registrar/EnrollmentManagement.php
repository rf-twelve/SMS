<?php

namespace App\Http\Livewire\Registrar;

use Livewire\Component;

use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Student;
use Livewire\WithFileUploads;

## Manage booklets only(Amounts and payee not necessary)
class EnrollmentManagement extends Component
{
    use WithPerPagePagination, WithBulkActions, WithCachedRows, WithFileUploads;

    public $student_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $address;
    public $age;
    public $sex;
    public $email;
    public $mobile_no;
    public $religion;
    public $citizenship;
    public $birth_date;
    public $birth_place;
    public $lrn;
    public $grade_level;
    public $strand;
    public $section;
    public $status;
    public $user_id;
    public $temp_image;
    public $image;
    public $image_filename;

     ## Modal initialize
     public $showDeleteSingleRecordModal = false;
     public $showFormModal = false;
     public $filters = [
         'search' => '',
         'status' => '',
         'sort-field' => 'first_name',
         'sort-direction' => 'asc',
         'status' => '',
         'amount-min' => null,
         'amount-max' => null,
         'date-min' => null,
         'date-max' => null,
     ];

    public function mount(){
        $this->student_id = null;
        $this->temp_image = null;
    }

    public function getRowsQueryProperty()
    {
        return Student::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->filters['sort-field'], 'like','%'.$search.'%'))
            ->orderBy($this->filters['sort-field'], $this->filters['sort-direction']);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('livewire.registrar.enrollment-management',[
            'records' => $this->rows
        ]);
    }

    public function sortBy($field){

        if($this->filters['sort-field'] === $field) {
            $this->filters['sort-by'] = $this->filters['sort-by'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->filters['sort-by'] = 'asc';
        }
        $this->filters['sort-field'] = $field;
    }

    public function toggleCreateRecordModal()
    {
        $this->resetFields();
        $this->showFormModal = true;
    }

    public function toggleEditRecordModal($id)
    {
        $data = Student::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
            'religion' => 'required',
            'citizenship' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'lrn' => 'required',
            'grade_level' => 'required',
            'strand' => 'required',
            'section' => 'required',
            'status' => 'required',
        ]);

        if (isset($this->temp_image)) {
            $filename = $this->temp_image->store('/','images');
        }

        $data = [
            'first_name' => $valid['first_name'],
            'middle_name' => $valid['middle_name'],
            'last_name' => $valid['last_name'],
            'address' => $valid['address'],
            'age' => $valid['age'],
            'sex' => $valid['sex'],
            'email' => $valid['email'],
            'mobile_no' => $valid['mobile_no'],
            'religion' => $valid['religion'],
            'citizenship' => $valid['citizenship'],
            'birth_date' => $valid['birth_date'],
            'birth_place' => $valid['birth_place'],
            'lrn' => $valid['lrn'],
            'grade_level' => $valid['grade_level'],
            'strand' => $valid['strand'],
            'section' => $valid['section'],
            'status' => $valid['status'],
            'image' => isset($this->temp_image)
                ? $this->temp_image->store('/','images')
                : $this->image_filename,
        ];

        // dd($data);

        isset($this->student_id)
            ? Student::find($this->student_id)->update($data)
            : Student::create($data);

        $this->notify('You\'ve save record successfully.');
        $this->resetFields();
        $this->showFormModal = false;
    }

    public function closeRecord()
    {
        $this->showFormModal = false;
        $this->resetFields();

    }

    public function toggleView($id)
    {
        return to_route('registrar/enrollment-management/view-student',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->student_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Student::destroy($this->student_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function setFields($data)
    {
        $this->student_id = $data['id'];
        $this->first_name = $data['first_name'];
        $this->middle_name = $data['middle_name'];
        $this->last_name = $data['last_name'];
        $this->address = $data['address'];
        $this->age = $data['age'];
        $this->sex = $data['sex'];
        $this->email = $data['email'];
        $this->mobile_no = $data['mobile_no'];
        $this->religion = $data['religion'];
        $this->citizenship = $data['citizenship'];
        $this->birth_date = $data['birth_date'];
        $this->birth_place = $data['birth_place'];
        $this->lrn = $data['lrn'];
        $this->grade_level = $data['grade_level'];
        $this->strand = $data['strand'];
        $this->section = $data['section'];
        $this->status = $data['status'];
        $this->user_id = $data['user_id'];
        $this->temp_image = null;
        $this->image = $data->imageUrl();
        $this->image_filename = $data['image'];
    }

    public function resetFields()
    {
        $this->student_id = null;
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->address = '';
        $this->age = '';
        $this->sex = '';
        $this->email = '';
        $this->mobile_no = '';
        $this->religion = '';
        $this->citizenship = '';
        $this->birth_date = '';
        $this->birth_place = '';
        $this->lrn = '';
        $this->grade_level = '';
        $this->strand = '';
        $this->section = '';
        $this->status = '';
        $this->user_id = '';
        $this->temp_image = null;
        $this->image = null;
        $this->image_filename = null;
    }

}
