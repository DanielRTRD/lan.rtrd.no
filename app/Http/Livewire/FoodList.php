<?php

namespace App\Http\Livewire;

use App\Models\Food;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class FoodList extends Component
{
    
    public function boot() {
        $this->foods = Food::orderBy('delivery_at', 'asc')->get();
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
        $this->emitTo('shopping-cart', '$refresh');
    }

    public function render()
    {
        return view('livewire.food-list');
    }
}
