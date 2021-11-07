<?php

namespace App\Helper;

class CartHelper{

    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($product, $product_quantity = 1){
       $item = [
           'id' => $product->id,
           'product_name' => $product->product_name,
           'product_price' => $product->product_price,
           'product_image' => $product->product_image,
           'product_size' => $product->product_size,
           'product_quantity' => $product_quantity,
       ];

       if(isset($this->items[$product->id])){
           $this->items[$product->id]['product_quantity'] += $product_quantity;
       }else{
           $this->items[$product->id] = $item;
       }

        session(['cart' => $this->items]);
    }

    public function remove($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    

    public function update($id,$product_quantity = 1){
        if(isset($this->items[$id])){
            $this->items[$id]['product_quantity'] = $product_quantity;
        }
        session(['cart' => $this->items]);
    }

    public function clear(){
        session(['cart' => '']);
    }

    private function get_total_price(){
        $t = 0;
        foreach($this->items as $item){
            $t+= $item['product_price'] * $item['product_quantity'];
        }
        return $t;
    }

    private function get_total_quantity(){
        $t = 0;
        foreach($this->items as $item){
            $t+= $item['product_quantity'];
        }
        return $t;
    }
}

?>