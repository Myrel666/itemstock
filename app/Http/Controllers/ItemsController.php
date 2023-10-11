<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function store(Request $request)
    {
        $productNames = $request->input('product_name');
        $productPrices = $request->input('product_price');
        $productQtys = $request->input('product_qty');

        foreach ($productNames as $key => $productName) {
            $item = new Item();
            $item->name = $productName;
            $item->price = $productPrices[$key];
            $item->quantity = $productQtys[$key];
            $item->save();
        }

        return 'Items Inserted Successfully!';
    }

}
