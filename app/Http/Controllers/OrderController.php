<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("order.index", ["orders" => Order::all(), "items" => OrderItem::orderBy('food_id')->orderBy('quantity')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $order = Order::find($id);
        if (Carbon::parse(env('FOOD_LAST_ORDER_DATE'))->isFuture() && !$order->paid && !$order->ordered) {
            /*
            *
            * DISCORD WEBHOOK
            *
            */
            if (env('DISCORD_ATTENDANCE_WEBHOOK_URL')) {
                $webhookurl = env('DISCORD_ATTENDANCE_WEBHOOK_URL');
                $json_data = json_encode([
                    "content" => ($order->user->name ? $order->user->name : $order->user->username)." har slettet sin ordre for mat!", // Message
                    "tts" => false, // Enable text-to-speech
                    // Embeds Array
                    "embeds" => [
                        [
                            "title" => $order->user->username, // Embed Title
                            "type" => "rich", // Embed Type
                            "description" => "Orderen var på ".$order->amount." kr", // Embed Description
                            "url" => route('dashboard'), // URL of title link
                            "timestamp" => Carbon::now()->toIso8601String(), // Timestamp of embed must be formatted as ISO8601
                            "color" => hexdec("ff0000"), // Embed left border color in HEX
                            // Footer
                            "footer" => [
                                "text" => $order->user->username, // Username
                            ],
                            // Author
                            "author" => [
                                "name" => 'Jeg har slettet min ordre for mat!',
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
            $order->delete();
        }
        return redirect()->route('food')->withSuccess('Ordre slettet.');
    }
}
