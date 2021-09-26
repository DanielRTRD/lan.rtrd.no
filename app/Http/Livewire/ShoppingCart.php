<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ShoppingCart extends Component
{
    protected $listeners = [
        'orderAdded' => '$refresh',
        'foodAdded' => '$refresh',
    ];

    public function boot() {
        $this->cart = Cart::getContent();
        $this->total = Cart::getTotal();
        $this->order = Order::where('user_id', auth()->id())->first();
        $this->phonenumber = config('lan.phone');
    }

    public function increment($itemId) {
        Cart::update(
            $itemId,
            [
                'quantity' => +1,
            ]
        );
        $this->hydrate();
    }

    public function decrement($itemId) {
        Cart::update(
            $itemId,
            [
                'quantity' => -1,
            ]
        );
        $this->hydrate();
    }

    public function remove($itemId) {
        Cart::remove($itemId);
        $this->hydrate();
    }

    public function removeAll() {
        Cart::clear();
        $this->hydrate();
    }

    public function order() {

        $cart = $this->cart;

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->amount = $this->total;
        $order->save();

        foreach ($cart as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->food_id = $item->id;
            $orderItem->quantity = $item->quantity;
            $orderItem->amount = $item->price;
            $orderItem->save();
        }
        /*
        *
        * DISCORD WEBHOOK
        *
        */
        if (env('DISCORD_ATTENDANCE_WEBHOOK_URL')) {
            $webhookurl = env('DISCORD_ATTENDANCE_WEBHOOK_URL');
            $json_data = json_encode([
                "content" => ($order->user->name ? $order->user->name : $order->user->username)." har lagt inn en ordre for mat!", // Message
                "tts" => false, // Enable text-to-speech
                // Embeds Array
                "embeds" => [
                    [
                        "title" => $order->user->username, // Embed Title
                        "type" => "rich", // Embed Type
                        "description" => "Orderen er på ".$order->amount." kr", // Embed Description
                        "url" => route('dashboard'), // URL of title link
                        "timestamp" => Carbon::now()->toIso8601String(), // Timestamp of embed must be formatted as ISO8601
                        "color" => hexdec("198754"), // Embed left border color in HEX
                        // Footer
                        "footer" => [
                            "text" => $order->user->username, // Username
                        ],
                        // Author
                        "author" => [
                            "name" => 'Jeg har lagt inn en ordre for mat!',
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
        $this->removeall();
        $this->emit('orderAdded');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
