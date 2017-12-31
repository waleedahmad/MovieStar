<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

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
}
