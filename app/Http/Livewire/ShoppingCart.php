<?php

namespace App\Http\Livewire;

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
        $this->removeall();
        $this->emit('orderAdded');
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
