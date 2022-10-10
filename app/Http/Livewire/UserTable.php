<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $role = '';
    public $status = '';
    public function render()
    {
        return view('livewire.user-table', [
            // 'data' => User::whereLike(['name','number','role'], $this->search)->paginate(5),
            'data' => User::where('role','like','%'.$this->role.'%')->whereLike(['name', 'number',], $this->search)->when($this->status, function($query, $status){
                return $query->where('status', $status);
            })->paginate(5),
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

}
