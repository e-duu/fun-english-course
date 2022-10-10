<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LevelTable extends Component
{
    use WithPagination;

    public $data;
    public $order = '';

    public function render()
    {
        if ($this->order == 'asc') {
            $lessons = $this->data->lessons()->orderBy('name', 'asc')->paginate(5);
        } elseif ($this->order == 'desc') {
            $lessons = $this->data->lessons()->orderBy('name', 'desc')->paginate(5);
        } else {
            $lessons = $this->data->lessons()->paginate(5);
        }

        return view('livewire.level-table',[
            'data' => $this->data,
            'lessons' => $lessons
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
