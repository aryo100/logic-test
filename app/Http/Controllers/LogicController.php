<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogicController extends Controller
{
    public function sameWord(Request $request)
    {
        // Mendapatkan dua kalimat dari request
        $word1 = strtolower($request->word1);
        $word2 = strtolower($request->word2);

        // Memeriksa panjang kedua kalimat harus sama
        if (strlen($word1) !== strlen($word2)) {
            return response()->json(['message' => 'Panjang kedua kalimat harus sama'], 400);
        }

        // Memeriksa setiap huruf pada kedua kalimat
        $char1 = str_split($word1);
        $char2 = str_split($word2);
        $cond = true;
        for ($i = 0; $i < strlen($char1); $i++) {
            $charcond = false;
            for ($j = 0; $j < strlen($char2); $j++) {
                if ($char1[$i] === $char2[$j]) {
                    $charcond = true;
                }
            }
            $cond = $charcond;
        }
        if($cond){
            return response()->json(['message' => 'Tidak semua huruf sama'], 400);
        }

        // Jika semua huruf sama
        return response()->json(['message' => 'Semua huruf sama'], 200);
    }
}
