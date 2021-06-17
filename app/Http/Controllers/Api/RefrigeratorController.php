<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Reception;
use App\Models\Refrigerator;
use Illuminate\Http\Request;

class RefrigeratorController extends Controller
{

    public function show(){
        $post = Refrigerator::all();
        return response()->json(['data' => $post], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }
    public function add(Request $request){
	if($request==null || $request=='') return ['result'=>'error'];

        $input = $request->all();
        $item = Refrigerator::firstOrNew(['name' => $input['name'] ]);
        $item->name = $input['name'];
        $item->all = $input['all'];
	$item->value = $input['all'];
        $item->weight = $input['weight'];
        $v = $item->save();
        if($v) return ['update'=>'true'];
        return ['update'=>'false'];

    }
    public function update(Request $request){
            $data = $request->all();
            return $data;
            foreach ($data as $comaker){
                $item = Refrigerator::find($comaker['id']);
//                if($comaker['all']==0.0 || $comaker['all']=='0.0'){
//                    return 1;
//                    $item->delete();
//
//                }
                $item->all = $comaker['all'];
		        $item->value = $comaker['all'];
                $v = $item->save();
            }
            if($v) return ['update'=>'true'];
            return ['update'=>'false'];
    }
    public function destroy($id){
        Refrigerator::findOrFail($id)->delete();
        return ['result'=>'true'];
    }
    public function destroy_all(){
        Refrigerator::truncate();
        return ['result'=>'true'];
    }
}
