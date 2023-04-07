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

        $this->productModel->addProduct($request);

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
        $product = DB::table('products')->where('id', $id)->first();

        return view('admin.pages.product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $bool = DB::table('products')->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'discount_price' => $request->discount_price,
        //     'short_description' => $request->short_description,
        //     'description' => $request->description,
        //     'quantity' => $request->quantity,
        // ]);

        // $message = "UPDATED";
        // if (!$bool) {
        //     $message = "UPDATE FAILED";
        // }
        // return redirect()->route('admin.products')->with('message', $message);

        // $product = DB::table('products')->where('id', $id)->first();
        // if ($product) {
        //     $oldImg = $request->image_url;

        //     $imageName = null;
        //     if ($request->image_url) {
        //         $imageName = uniqid() . '_' . $request->image_url->getClientOriginalName();
        //         $request->image_url->move(public_path('images'), $imageName);
        //         unlink('images' . '/' . $oldImg);
        //     }

        //     if (!is_null($imageName)) {
        //         $check = DB::table('products')->where('id', $id)->update(['image_url' => $imageName]);
        //         $message = $check ? 'Updated' : 'Failed';
        //         return redirect()->route('admin.products')->with('message', $message);
        //     }
        //     // dd($product);
        // }
        $this->productModel->updateProduct($request);

        return redirect()->route('admin.products')->with('message', 'SUCCESS!');
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
