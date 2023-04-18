<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'image_url'
    // ];

    public function addProduct($request)
    {
        $imageName = null;
        if ($request->image_url) {
            $imageName = uniqid() . '_' . $request->image_url->getClientOriginalName();
            $request->image_url->move(public_path('images'), $imageName);
        }

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image_url' => $imageName
        ]);
    }

    public function updateProduct($request)
    {
        $product = DB::table('products')->where('id', $request['id'])->first();

        $oldImg = $product->image_url;

        $imageName = null;
        if ($request->image_url) {
            $imageName = uniqid() . '_' . $request->image_url->getClientOriginalName();
            $request->image_url->move(public_path('images'), $imageName);
            unlink("images/" . $oldImg);
        }
        if (!is_null($imageName)) {
            DB::table('products')->where('id', $request['id'])->update(['image_url' => $imageName]);
        }

        $request = $request->except('_token');
        DB::table('products')->where('id', $request['id'])->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'discount_price' => $request['discount_price'],
            'description' => $request['description'],
            'short_description' => $request['short_description'],
            'status' => $request['status'],
        ]);
    }
}
