<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
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
            /*
            *
            * DISCORD WEBHOOK
            *
            */
            if (env('DISCORD_ATTENDANCE_WEBHOOK_URL')) {
                $webhookurl = env('DISCORD_ATTENDANCE_WEBHOOK_URL');
                $json_data = json_encode([
                    "content" => ($attendance->user->name ? $attendance->user->name : $attendance->user->username)." vil fortsatt være med på LAN-party, men gjorde noen endringer!", // Message
                    "tts" => false, // Enable text-to-speech
                    // Embeds Array
                    "embeds" => [
                        [
                            "title" => $attendance->user->username, // Embed Title
                            "type" => "rich", // Embed Type
                            "description" => "Fra ".$attendance->from_date." til ".$attendance->to_date, // Embed Description
                            "url" => route('dashboard'), // URL of title link
                            "timestamp" => Carbon::now()->toIso8601String(), // Timestamp of embed must be formatted as ISO8601
                            "color" => hexdec("FFA500"), // Embed left border color in HEX
                            // Footer
                            "footer" => [
                                "text" => $attendance->user->username, // Username
                            ],
                            // Author
                            "author" => [
                                "name" => 'Jeg vil fortsatt være med!',
                            ],
                        ]
                    ]
                
                ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
                $ch = curl_init( $webhookurl );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec( $ch );
                curl_close( $ch );
            }
            /*
            *
            * END DISCORD WEBHOOK
            *
            */
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
            /*
            *
            * DISCORD WEBHOOK
            *
            */
            if (env('DISCORD_ATTENDANCE_WEBHOOK_URL')) {
                $webhookurl = env('DISCORD_ATTENDANCE_WEBHOOK_URL');
                $json_data = json_encode([
                    "content" => ($attendance->user->name ? $attendance->user->name : $attendance->user->username)." vil være med på LAN-party!", // Message
                    "tts" => false, // Enable text-to-speech
                    // Embeds Array
                    "embeds" => [
                        [
                            "title" => $attendance->user->username, // Embed Title
                            "type" => "rich", // Embed Type
                            "description" => "Fra ".$attendance->from_date." til ".$attendance->to_date, // Embed Description
                            "url" => route('dashboard'), // URL of title link
                            "timestamp" => Carbon::now()->toIso8601String(), // Timestamp of embed must be formatted as ISO8601
                            "color" => hexdec("198754"), // Embed left border color in HEX
                            // Footer
                            "footer" => [
                                "text" => $attendance->user->username, // Username
                            ],
                            // Author
                            "author" => [
                                "name" => 'Jeg vil være med!',
                            ],
                        ]
                    ]
                
                ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
                $ch = curl_init( $webhookurl );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec( $ch );
                curl_close( $ch );
            }
            /*
            *
            * END DISCORD WEBHOOK
            *
            */
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
        $attendance = auth()->user()->attendance;
        $foodOrder = auth()->user()->order;
        if ($foodOrder) {
            $this->emit('hasFoodOrder');
            return;
        }
        /*
        *
        * DISCORD WEBHOOK
        *
        */
        if (env('DISCORD_ATTENDANCE_WEBHOOK_URL')) {
            $webhookurl = env('DISCORD_ATTENDANCE_WEBHOOK_URL');
            $json_data = json_encode([
                "content" => ($attendance->user->name ? $attendance->user->name : $attendance->user->username)." kan ikke være med på LAN-party likevel!", // Message
                "tts" => false, // Enable text-to-speech
                // Embeds Array
                "embeds" => [
                        [
                            "title" => $attendance->user->username, // Embed Title
                            "type" => "rich", // Embed Type
                            "description" => "Jeg måtte dessverre kansellere deltakelsen min.", // Embed Description
                            "url" => route('dashboard'), // URL of title link
                            "timestamp" => Carbon::now()->toIso8601String(), // Timestamp of embed must be formatted as ISO8601
                            "color" => hexdec("ff0000"), // Embed left border color in HEX
                            // Footer
                            "footer" => [
                                "text" => $attendance->user->username, // Username
                            ],
                            // Author
                            "author" => [
                                "name" => 'Jeg kan ikke være med!',
                            ],
                        ]
                    ]
                    
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
            $ch = curl_init( $webhookurl );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec( $ch );
            curl_close( $ch );
        }
        /*
        *
        * END DISCORD WEBHOOK
        *
        */
        $attendance->delete();
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
