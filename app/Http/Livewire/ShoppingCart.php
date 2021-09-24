<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
