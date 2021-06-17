<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Refrigerator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = Product::all();
        return  view('dashboard.product.index',compact('items')); //Показываем все продукты

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');

        Product::create($input); //добавляем новый продукт

        return redirect()->route('dashboard.product.index')->with('success', 'вы успешно добавили продукт');
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
    public function edit($id) // Показать форму редактирования указанного ресурса
    {
        $item = Product::where('id',$id)->first();

        return  view('dashboard.product.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Обновить указанный ресурс в хранилище.
    {
        $input = $request->except('_token');
        $all = ($request->qty)*($request->value);
        $input['all'] = $all;
        $item = Product::find($id);
        $item->update($input);

        return redirect()->route('dashboard.product.index')->with('success', 'вы успешно редактировали продукт');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Удалите указанный ресурс из хранилища.

    {
        Product::findOrFail($id)->delete();
        return redirect()->route('dashboard.product.index')
            ->with('success','Запись успешно удален');
    }
}
