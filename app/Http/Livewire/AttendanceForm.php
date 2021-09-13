<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Attendance;

class AttendanceForm extends Component
{
    public $from_date;
    public $to_date;
    public $towel;
    public $pillow_douvet;
    public $pillow_douvet_cover;
    public $bringing_bed;
    public $vaccine;
    public $comment;
    public $hasAttendance;
    public $noAttendance;

    protected $listeners = ['attendanceListUpdate' => 'mount'];

    public function mount() {
        $user = auth()->user();
        $this->from_date = ($user->attendance ? $user->attendance->from_date : null);
        $this->to_date = ($user->attendance ? $user->attendance->to_date : null);
        $this->towel = ($user->attendance ? $user->attendance->towel : false);
        $this->pillow_douvet = ($user->attendance ? $user->attendance->pillow_douvet : false);
        $this->pillow_douvet_cover = ($user->attendance ? $user->attendance->pillow_douvet_cover : false);
        $this->bringing_bed = ($user->attendance ? $user->attendance->bringing_bed : false);
        $this->vaccine = ($user->attendance ? $user->attendance->vaccine : null);
        $this->comment = ($user->attendance ? $user->attendance->comment : null);
        $this->hasAttendance = ($user->attendance ? true : false);
        $this->noAttendance = ($user->attendance ? false : true);
    }

    /**
     * Update the user's GameJolt Account credentials.
     *
     * @return void
     */
    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate([
            'from_date' => ['required', 'before:to_date'],
            'to_date' => ['required', 'after:from_date'],
            'towel' => ['nullable'],
            'pillow_douvet' => ['nullable'],
            'pillow_douvet_cover' => ['nullable'],
            'bringing_bed' => ['nullable'],
            'vaccine' => ['required'],
            'comment' => ['nullable', 'string'],
        ]);


        $attendance = Attendance::where('user_id', auth()->user()->id)->first();
        if ($attendance) {
            $attendance->update([
                'from_date' => $this->from_date,
                'to_date' => $this->to_date,
                'towel' => $this->towel,
                'pillow_douvet' => $this->pillow_douvet,
                'pillow_douvet_cover' => $this->pillow_douvet_cover,
                'bringing_bed' => $this->bringing_bed,
                'vaccine' => $this->vaccine,
                'comment' => $this->comment,
            ]);
            $this->emit('saved');
        } else {
            $attendance = Attendance::create([
                'user_id' => auth()->user()->id,
                'from_date' => $this->from_date,
                'to_date' => $this->to_date,
                'towel' => $this->towel,
                'pillow_douvet' => $this->pillow_douvet,
                'pillow_douvet_cover' => $this->pillow_douvet_cover,
                'bringing_bed' => $this->bringing_bed,
                'vaccine' => $this->vaccine,
                'comment' => $this->comment,
            ]);
            $this->emit('attendanceListUpdate');
            //return redirect()->route('dashboard'); // FFS - Fix this or not?
        }
        $user = auth()->user();
        $this->from_date = $user->attendance->from_date;
        $this->to_date = $user->attendance->to_date;
        $this->towel = $user->attendance->towel;
        $this->pillow_douvet = $user->attendance->pillow_douvet;
        $this->pillow_douvet_cover = $user->attendance->pillow_douvet_cover;
        $this->bringing_bed = $user->attendance->bringing_bed;
        $this->vaccine = $user->attendance->vaccine;
        $this->comment = $user->attendance->comment;
        $this->hasAttendance = true;
        $this->noAttendance = false;
        $this->emit('attendanceListUpdate');
    }

    public function delete() {
        auth()->user()->attendance->delete();
        $this->from_date = null;
        $this->to_date = null;
        $this->towel = false;
        $this->pillow_douvet = false;
        $this->pillow_douvet_cover = false;
        $this->bringing_bed = false;
        $this->vaccine = "";
        $this->comment = null;
        $this->hasAttendance = false;
        $this->noAttendance = false;
        $this->emit('attendanceListUpdate');
    }

    public function render()
    {
        return view('livewire.attendance-form');
    }
}
