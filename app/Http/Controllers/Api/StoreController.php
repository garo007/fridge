<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function show($id){

        $recept = Reception::where('id', $id)->first();
        $recept_product = json_decode($recept->products, true);

        $true = [];
        $false = [];
        for($i=0;$i<count($recept_product);$i++){
            $product = DB::table('refrigerators')->where('name',$recept_product[$i]['name'])->first();
            $row = [];

            if($product){
                $true_1[]['true'] = $recept_product[$i]['name'];

                if($recept_product[$i]['weight'] == 'г'){
                    $recept_product[$i]['all'] = (int)$recept_product[$i]['all'] / 1000;
                }
                if($recept_product[$i]['weight'] == 'мл'){
                    $recept_product[$i]['all'] = (int)$recept_product[$i]['all'] / 1000;
                }
                for($j=0;$j<count($true_1);$j++){
                    $true[$j]['true_all'] = $recept_product[$i]['all'];
                    $true[$j]['true'] = $recept_product[$i]['name'];
                }


            }else{
                $row['name'] = $recept_product[$i]['name'];
                $row['all'] = $recept_product[$i]['all'];
                $row['weight'] = $recept_product[$i]['weight'];
                $false[] = $row;
            }
        }

        for($i=0;$i<count($true);$i++) {
            $prod = DB::table('refrigerators')->where('name', $true[$i]['true'])->first();
            $row = [];

            if ($prod->weight == 'г'){
                $prod->weight = 'кг';
                $prod->all = (int)$prod->all / 1000;
            }
            if ($prod->weight == 'мл'){
                $prod->weight = 'л';
                $prod->all = (int)$prod->all / 1000;
            }
            $row['name'] = $prod->name;
            $row['pakas'] = $true[$i]['true_all'];
            $row['weight'] = $recept_product[$i]['weight'];
            $k[] = $row;
        }

        return response()->json(['data' => $false], 200, [
            'Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }
}
