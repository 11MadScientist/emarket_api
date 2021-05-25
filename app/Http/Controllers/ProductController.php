<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('products')
        ->join('storeinfo', 'storeinfo.id', 'products.store_id')
        ->select('products.id', 'store_id', 'category_id', 'category_name', 'prod_name', 'prod_img', 'prod_price', 'prod_unit',
                 'prod_desc', 'prod_stock', 'prod_sales', 'prod_avail', 'prod_favorite', 'store_name', 'store_location')
        ->get();
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
    public function store(Request $request)
    {
        $products = $request->isMethod('put') ? Product::findOrFail($request->id) : new Product;

        $products-> id                = $request->input('id');
        $products-> store_id          = $request->input('store_id');
        $products-> category_id       = $request->input('category_id');
        $products-> category_name     = $request->input('category_name');
        $products-> prod_name         = $request->input('prod_name');
        $products-> prod_img          = $request->input('prod_img');
        $products-> prod_price         = $request->input('prod_price');
        $products-> prod_unit          = $request->input('prod_unit');
        $products-> prod_desc          = $request->input('prod_desc');
        $products-> prod_stock         = $request->input('prod_stock');
        $products-> prod_sales         = $request->input('prod_sales');
        $products-> prod_avail         = $request->input('prod_avail');
        $products-> prod_favorite      = $request->input('prod_favorite');

        if ($products->save())
        {
            return new ProductResource($products);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('products')
        ->join('storeinfo', 'storeinfo.id', 'products.store_id')
        ->select('products.id', 'store_id', 'category_id', 'category_name', 'prod_name', 'prod_img', 'prod_price', 'prod_unit',
                 'prod_desc', 'prod_stock', 'prod_sales', 'prod_avail', 'prod_favorite', 'store_name', 'store_location')
        ->where('products.id', $id)
        ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
