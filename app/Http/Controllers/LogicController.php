<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogicController extends Controller
{
    public function sameWord(Request $request)
    {
        $word1 = strtolower($request->word1);
        $word2 = strtolower($request->word2);

        if (strlen($word1) !== strlen($word2)) {
            return response()->json(['message' => 'Panjang kedua kalimat harus sama'], 400);
        }

        $sortedWord1 = str_split($word1);
        $sortedWord2 = str_split($word2);

        sort($sortedWord1);
        sort($sortedWord2);

        $result = ($sortedWord1 == $sortedWord2);
        if($result){
            return response()->json(['message' => 'Semua huruf sama'], 200);
        }else{
            return response()->json(['message' => 'Tidak semua huruf sama'], 400);
        }
    }
}
