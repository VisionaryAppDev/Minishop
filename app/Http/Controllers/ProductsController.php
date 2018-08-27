<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'info']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $products = Product::orderBy('id', 'desc')->get();
        return  $products = Product::orderBy('id', 'desc')->take(1)->get();
        return  $products = Product::orderBy('id', 'desc')->paginate(10);   // in the client {{$products->links()}} // to get link      
        return  $products = Product::where('id', 1)->get();
        return $products = DB::select('SELECT * FROM Products');

        return view('products.index')->with('products', $products);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->date = Carbon::now();
        $product->user_id = auth()->user()->id; 
        $product->available = 0; 
        $product->save();

       
        $uploadedFiles=$request->files;
        foreach ($uploadedFiles as $file){
           // $file->store('dummy');
        }

        return response(['status'=>'success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit')->with('product', $product);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { // you need a hidden method PUT to call this one
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);


        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->input('image');
        $product->save();

        return redirect('/products')->with('success', 'Product Updated! ');
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

    public function info()
    {
        return Product::orderBy('name', 'asc')->get();
    }
}
