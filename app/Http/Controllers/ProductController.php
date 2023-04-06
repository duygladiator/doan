<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->get();
        return view('admin.pages.product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        // $request->except('_token');

        // DB::table('products')->insert([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'discount_price' => $request->discount_price,
        //     'short_description' => $request->short_description,
        //     'description' => $request->description,
        //     'quantity' => $request->quantity,
        // ]);

        // dd($request->all());



        return redirect()->route('admin.products')->with('message', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->get();

        return view('admin.pages.product.edit', ['product' => $product[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $bool = DB::table('products')->update([
            'name' => $request->name,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        $message = "UPDATED";
        if (!$bool) {
            $message = "UPDATE FAILED";
        }
        return redirect()->route('admin.products')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $bool = DB::table('products')->delete('id', $id);

        $message = "DELETED";
        if (!$bool) {
            $message = "FAILED";
        }

        return redirect()->route('admin.products')->with('message', $message);
    }
}
