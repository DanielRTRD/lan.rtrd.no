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
    public $comment;

    public function mount() {
        $user = auth()->user();
        $this->from_date = ($user->attendance ? $user->attendance->from_date : null);
        $this->to_date = ($user->attendance ? $user->attendance->to_date : null);
        $this->towel = ($user->attendance ? $user->attendance->towel : false);
        $this->pillow_douvet = ($user->attendance ? $user->attendance->pillow_douvet : false);
        $this->pillow_douvet_cover = ($user->attendance ? $user->attendance->pillow_douvet_cover : false);
        $this->bringing_bed = ($user->attendance ? $user->attendance->bringing_bed : false);
        $this->comment = ($user->attendance ? $user->attendance->comment : null);
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
            'from_date' => ['required'],
            'to_date' => ['required'],
            'towel' => ['nullable'],
            'pillow_douvet' => ['nullable'],
            'pillow_douvet_cover' => ['nullable'],
            'bringing_bed' => ['nullable'],
            'comment' => ['required'],
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
                'comment' => $this->comment,
            ]);
        } else {
            Attendance::create([
                'user_id' => auth()->user()->id,
                'from_date' => $this->from_date,
                'to_date' => $this->to_date,
                'towel' => $this->towel,
                'pillow_douvet' => $this->pillow_douvet,
                'pillow_douvet_cover' => $this->pillow_douvet_cover,
                'bringing_bed' => $this->bringing_bed,
                'comment' => $this->comment,
            ]);
        }
        $this->emit('saved');
        
        return;
    }

    public function render()
    {
        return view('livewire.attendance-form');
    }
}
