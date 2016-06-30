<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use Response;

class ProductController extends Controller
{
  private $products;

  public function __construct(Product $p)
  {
    $this->products = $p;
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $products =  $this->products->paginate(5);
    return view('products.list',['products' => $products]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('products.form');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ProductRequest $r)
  {
    $new_product = $this->products->create($r->all());
    //  return $new_product;

    \Session::flash('success_message','Produto cadastrado!');

    //json para api...
    // return Response::json([
    //   'data' => $new_product,
    //   'msg' => 'Produto cadastrado!'
    // ], 200);

    return redirect('products/create');
  } 

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $product_to_edit = $this->products->findOrFail($id);

    return view('products.form',['product'=>$product_to_edit]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ProductRequest $r, $id)
  {
    $product_to_update = $this->products->findOrFail($id);

    $product_to_update->update($r->all());
    \Session::flash('success_message','Produto atualizado!');
    return redirect('products/'.$id.'/edit');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $this->products->find($id)->delete();
    \Session::flash('success_message','Produto excluido!');
    return redirect('products');
  }
}
