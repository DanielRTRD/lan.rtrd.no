<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class ShoppingCart extends Component
{
    protected $listeners = [
        '$refresh'
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
        $this->boot();
    }

    public function decrement($itemId) {
        Cart::update(
            $itemId,
            [
                'quantity' => -1,
            ]
        );
        $this->boot();
    }

    public function remove($itemId) {
        Cart::remove($itemId);
        $this->boot();
    }

    public function removeAll() {
        Cart::clear();
        $this->boot();
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
