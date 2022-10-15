<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

define('UPLOAD_PATH', '/upload_img/');

/**
 * Description of ProductController
 *
 * @author Mahmudul Hasan Khan CSE
 */

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productList = Product::latest()->paginate(5);
        return view('products.index', compact('productList'))
        ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        // dd($request->all());

        $product_data = array();

        $product_data["product_name"] = $request->product_name;
        $product_data["product_description"] = $request->product_description;
        $product_data["product_quantity"] = $request->product_quantity;
        $product_data["product_price"] = $request->product_price;
        $product_data["pr_publication_status"] = $request->pr_publication_status;

        if($request->hasfile('product_image'))
        {
            $name = "prd".time().$request->product_image->getClientOriginalName();
            $request->product_image->move(public_path(UPLOAD_PATH), $name);
            $product_data["product_image"] = $name;
            $product_data["upload_path"] = UPLOAD_PATH;
        }

        // dd($product_data);

        Product::create($product_data);
        return redirect()->route('product.index')->with('message', 'Product has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //

        // dd($request->all());

        $product_data = array();

        $product_data["product_name"] = $request->product_name;
        $product_data["product_description"] = $request->product_description;
        $product_data["product_quantity"] = $request->product_quantity;
        $product_data["product_price"] = $request->product_price;
        $product_data["pr_publication_status"] = $request->pr_publication_status;

        if($request->hasfile('product_image'))
        {
            $name = "prd".time().$request->product_image->getClientOriginalName();
            $request->product_image->move(public_path(UPLOAD_PATH), $name);
            $product_data["product_image"] = $name;
            $product_data["upload_path"] = UPLOAD_PATH;
        }

        // dd($product_data);

        $product->update($product_data);
        return redirect()->route('product.index')->with('message', 'Product has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('product.index')->with('message', 'Product has been deleted successfully');
    }
}
