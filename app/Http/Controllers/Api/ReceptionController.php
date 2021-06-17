<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index()
    {
        $post = Reception::all();

        foreach ($post as $key => $item) {
            $item["products"] = json_decode($post[$key]['products'],true);
            $post[$key] = $item;
        }

        return response()->json(['data' => $post], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }
    public function show($id)
    {
        $post = Reception::where('id',$id)->get();

        return response()->json(['data' => $post], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }

}
