<?php

namespace App\Http\Livewire;

use App\Models\Attendance;
use Livewire\Component;

class AttendanceList extends Component
{
    public $list;
    public $count;

    protected $listeners = ['attendanceListUpdate' => 'mount'];

    public function mount() {
        $this->list = Attendance::all();
        $this->count = Attendance::all()->count();
    }

    public function render()
    {
        return view('livewire.attendance-list');
    }
}
