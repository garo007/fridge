<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Refrigerator;
use Illuminate\Http\Request;

class RefrigeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Refrigerator::all(); //Вывести список холодильника

        return  view('dashboard.refrigerator.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all(); //Покажем форму для создания нового.

        return  view('dashboard.refrigerator.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->qty=0;
        $input = $request->except('_token');
        if($request->qty==0 || $request->value==0){  //Проверяем, что количество товара не равно нулю
            $all = ($request->qty)+($request->value);
        }else{
            $all = ($request->qty)*($request->value);
        }


        $input['all'] = $all;
        Refrigerator::create($input); //Сохраните вновь созданный ресурс в хранилище:

        return redirect()->route('dashboard.refrigerator.index')->with('success', 'вы успешно добавили продукт');
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
        $item = Refrigerator::where('id',$id)->first(); //Показать форму редактирования указанного ресурса.
        $products = Product::all();
        return  view('dashboard.refrigerator.edit',compact('item','products'));
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
        $request->qty=0;
        $input = $request->except('_token');
        if($request->qty==0 || $request->value==0){ //Проверяем, что количество товара не равно нулю
            $all = ($request->qty)+($request->value);
        }else{
            $all = ($request->qty)*($request->value);
        }
        $input['all'] = $all;

        $item = Refrigerator::find($id);
        $item->update($input); //Обновить указанный ресурс в хранилище.

        return redirect()->route('dashboard.refrigerator.index')->with('success', 'вы успешно редактировали продукт');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) ///Удалите указанный ресурс из хранилища.
    {
        Refrigerator::findOrFail($id)->delete();
        return redirect()->route('dashboard.refrigerator.index')
            ->with('success','Запись успешно удален');
    }
}
