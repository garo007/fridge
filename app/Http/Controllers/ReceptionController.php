<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Reception::all(); //Вывести список рецептов.
        return  view('dashboard.reception.index',compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all(); // Показать форму для создания нового рецепта.

        return  view('dashboard.reception.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //Сохраните вновь созданный ресурс в хранилище.
    {

        $array = [];
        for ($i = 0; $i < count($request->name); $i++) {
            $array[$i]['name'] = $request->name[$i];
            $array[$i]['qty'] = 0;
            $array[$i]['value'] = $request->value[$i];
            $array[$i]['weight'] = $request->weight[$i];
            $array[$i]['all'] = $request->value[$i];

        }

        $arrData = json_encode($array, JSON_UNESCAPED_UNICODE);
        $kitchen = $request->kitchen;
        $type = $request->type;

        Reception::create([
            'reception' => $request->reception,
            'name_recept' => $request->name_recept,
            'products' => $arrData,
            'kitchen' => $kitchen,
            'type' => $type,
        ]);
        return redirect()->route('dashboard.reception.index')->with('success', 'вы успешно добавили рецепт');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function show(Reception $reception)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //Показать форму редактирования указанного рецептa.
    {
        $item = Reception::findOrFail($id);
        $products = Product::all();

        $datajson = (json_decode($item->products, true));

        return view('dashboard.reception.edit')->with([
            'item' => $item,
            'datajson' => $datajson,
            'products' => $products,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //Обновить указанный ресурс в хранилище.
    {

        $reception = $request->reception;
        $array = [];
        for ($i = 0; $i < count($request->name); $i++) {
            $array[$i]['name'] = $request->name[$i];
            $array[$i]['qty'] = 0;
            $array[$i]['value'] = $request->value[$i];
            $array[$i]['weight'] = $request->weight[$i];
 	    $array[$i]['all'] = $request->value[$i];
        }

        $arrData = json_encode($array,JSON_UNESCAPED_UNICODE);

        $item = Reception::find($id);
        $item->update([                 //Сохраняем внесенные изменения
            'reception' => $reception,
            'name_recept' => $request->name_recept,
            'products' => $arrData,
            'kitchen' => $request->kitchen,
            'type' => $request->type,
        ]);
        return  redirect()->route('dashboard.reception.index')->with('success', 'ваш рецепт успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reception  $reception
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Удалить указанный ресурс из хранилища.
    {
        Reception::findOrFail($id)->delete();
        return redirect()->route('dashboard.reception.index')
            ->with('success','Запись успешно удален');
    }
}
