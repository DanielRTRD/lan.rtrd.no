<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\Order;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class FoodList extends Component
{
    protected $listeners = [
        'orderAdded' => '$refresh',
        'foodAdded' => '$refresh',
    ];

    public function boot() {
        $this->foods = Food::orderBy('delivery_at', 'asc')->get();
        $this->order = Order::where('user_id', auth()->id())->first();
        $this->last_order_date = config('lan.last_food_order_date');
        $this->canCancel = Carbon::parse($this->last_order_date)->isFuture();
        $this->phonenumber = config('lan.phone');
    }

    public function add($id, $name, $delivery_at, $price) {
        $item = Cart::get($id);
        if ($item) {
            if ($item->quantity < 10) {
                Cart::add([
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'quantity' => 1,
                    'attributes' => [
                        'delivery_at' => $delivery_at,
                    ],
                ]);
            }
        } else {
            Cart::add([
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => 1,
                'attributes' => [
                    'delivery_at' => $delivery_at,
                ],
            ]);
        }
        $this->emit('foodAdded');
    }

    public function render()
    {
        return view('livewire.food-list');
    }
}
