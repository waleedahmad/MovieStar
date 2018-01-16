<?php

namespace App\Http\Controllers;

use App\FoodCart;
use App\FoodOrderItem;
use App\FoodOrders;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class FoodController extends Controller
{
    public function getFoodItems(){
        $items = Menu::all();
        return view('admin.food_menu.menu_items')->with('items', $items);
    }

    public function addFood(){
        return view('admin.food_menu.add');
    }

    public function saveFood(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' =>  'required',
            'price' => 'required|numeric|min:1',
            'prep_time' => 'required|numeric|min:1',
        ]);

        if($validator->passes()){
            $item = new Menu();
            $item->item_name = $request->name;
            $item->price = $request->price;
            $item->prep_time = $request->prep_time;
            $item->availability = $request->has('availability') ? true : false;

            if($item->save()){
                return redirect('/admin/menu');
            }
        }else{
            return redirect('/admin/menu/add')->withErrors($validator)->withInput();
        }
    }

    public function deleteFood(Request $request){
        $item = Menu::find($request->id);
        return response()->json([
            'deleted' => $item->delete()
        ]);
    }

    public function editFood($id){
        $item = Menu::find($id);
        return view('admin.food_menu.edit')->with('item', $item);
    }

    public function updateFood(Request $request){
        $validator = \Validator::make($request->all(), [
            'name' =>  'required',
            'price' => 'required|numeric|min:1',
            'prep_time' => 'required|numeric|min:1',
        ]);

        if($validator->passes()){
            $item = Menu::find($request->id);
            $item->item_name = $request->name;
            $item->price = $request->price;
            $item->prep_time = $request->prep_time;
            $item->availability = $request->has('availability') ? true : false;

            if($item->save()){
                return redirect('/admin/menu');
            }
        }else{
            return redirect('/admin/menu/'.$request->id.'/edit')->withErrors($validator)->withInput();
        }
    }

    public function getOrders()
    {
        $orders = FoodOrders::all();
        return view('admin.food_menu.orders')->with('orders', $orders);
    }

    public function getSingleOrder($id)
    {
        $order = FoodOrders::find($id);
        return view('admin.food_menu.order')->with('order', $order);
    }

    public function deleteOrder(Request $request)
    {

    }

    public function markOrderCompleted(Request $request){
        $order = FoodOrders::find($request->id);

        $order->completed = $request->action === 'true' ? true : false;

        if($order->save()){
            return response()->json([
                'updated'   =>  true
            ]);
        }




    }

    public function markOrderPaid(Request $request)
    {
        $order = FoodOrders::find($request->id);
        $order->paid = $request->action === 'true' ? true : false;

        if($order->save()){
            return response()->json([
                'updated'   =>  true
            ]);
        }

    }

    public function getUserMenu()
    {
        $menu = Menu::where('availability', '=', 1)->get();
        return view('food.menu')->with('menu', $menu);
    }

    public function getCheckoutItems(){
        $cart = FoodCart::where('user_id', '=', Auth::user()->id)->get();
        return view('food.cart')->with('cart', $cart);
    }

    public function getUserOrders()
    {
        $orders = FoodOrders::where('user_id', '=', Auth::user()->id)->get();
        return view('food.orders')->with('orders', $orders);
    }

    public function getUserOrder($id){
        $order = FoodOrders::find($id);
        return view('food.order')->with('order', $order);
    }

    public function addToCart(Request $request){
        $validator = \Validator::make($request->all(),[
            'quantity' => 'required|numeric|min:1',
        ]);

        if($validator->passes()){
            $cart_item = FoodCart::where('user_id', '=', Auth::user()->id)->where('item_id', '=', $request->id);

            if($cart_item->count()){
                $cart_item = $cart_item->first();
                $cart_item->item_id = $request->id;
                $cart_item->quantity += $request->quantity;
                $cart_item->user_id = Auth::user()->id;
                if($cart_item->save()){
                    return response()->json([
                        'created' => true,
                    ]);
                }
            }else{
                $cart_item = new FoodCart();
                $cart_item->item_id = $request->id;
                $cart_item->quantity = $request->quantity;
                $cart_item->user_id = Auth::user()->id;
                if($cart_item->save()){
                    return response()->json([
                        'created' => true,
                    ]);
                }
            }

        }else{
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
    }

    public function deleteCheckoutItem(Request $request)
    {
        return response()->json([
            'deleted'   => FoodCart::find($request->id)->delete()
        ]);
    }

    public function processCheckout()
    {
        $cart = FoodCart::where('user_id', '=', Auth::user()->id);
        $order = new FoodOrders();
        $total = 0;
        foreach($cart->get() as $item){
            $total += $item->menu->price * $item->quantity;
        }
        $order->user_id = Auth::user()->id;
        $order->total = $total;
        $order->completed = false;
        $order->paid = false;

        if($order->save()){
            foreach($cart->get() as $item){
                $order_item = new FoodOrderItem();
                $order_item->item_id = $item->item_id;
                $order_item->order_id = $order->id;
                $order_item->quantity = $item->quantity;
                if($order_item->save()){
                    $item->delete();
                }
            }

            return response()->json([
                'processed' => true,
            ]);
        }
    }

    public function cancelOrder(Request $request)
    {
        return response()->json([
            'deleted' => FoodOrders::find($request->id)->delete()
        ]);
    }


    
}
