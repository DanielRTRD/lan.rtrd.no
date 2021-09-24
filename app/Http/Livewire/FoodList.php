<?php

namespace App\Http\Livewire;

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
    }

    public function add($id, $name, $delivery_at, $price) {
        //dd($id, $name, $price);
        Cart::add([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'attributes' => [
                'delivery_at' => $delivery_at,
            ],
        ]);
        $this->emit('foodAdded');
    }

    public function render()
    {
        return view('livewire.food-list');
    }
}
