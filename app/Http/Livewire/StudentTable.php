<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTable extends Component
{
    use WithPagination;

    public $data;

    public $status = '';
    public $month = '';
    public $year = '';
    public $search = '';

    public function render()
    {
        // $student = Student::where('users.name','like','%'.$this->search.'%');
        $student = Student::join('accounts', 'accounts.id', '=', 'students.user_id')
        ->select('students.*', 'accounts.name')->where('accounts.name','like','%'.$this->search.'%');
        return view('livewire.student-table', [
            'data' => Level::find($this->data->id),
            'spps' => $student->when($this->status, function($query, $status){
                return $query->where('students.status', $status);
            })->when($this->month, function($query, $month){
                return $query->where('month', $month);
            })->when($this->year, function($query, $year){
                return $query->where('year', $year);
            })->paginate(5),
            'students' => Student::where('level_id', $this->data->id)->get()
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
