<?php
namespace App\Helper;

class CartHelper{
    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;

    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($product,$quantity = 1){
    $item = [
        'id' => $product->pro_id,
        'name' =>$product->pro_name,
        'thumbnail' =>$product->pro_thumbnail,
        'price' =>$product->pro_sale ? $product->pro_sale : $product->pro_price,
        'quantity' => $quantity,
        ];
    if (isset($this->items[$product->pro_id])){
        $this->items[$product->pro_id]['quantity'] += $quantity;
    }else {
        $this->items[$product->pro_id] = $item;
    }
    session(['cart' => $this->items]);
    }

    public function remove($id){
        if (isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity = 1){
        if ($this->items[$id]){
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }

    public function clear(){
        session(['cart' => '']);
    }

    private function get_total_price(){
        $price = 0;
        foreach ($this->items as $item){
            $price += $item['price']*$item['quantity'];
        }
        return $price;
    }

    private function get_total_quantity(){
        $quantity = 0;
        foreach ($this->items as $item){
            $quantity += $item['quantity'];
        }
        return $quantity;
    }
}
