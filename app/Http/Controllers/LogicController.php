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

    function longLetter(Request $request) {
        $sentence = str_replace(' ', '', strtolower($request->word));
        $letterCount = [];
    
        foreach (str_split($sentence) as $letter) {
            if (isset($letterCount[$letter])) {
                $letterCount[$letter]++;
            } else {
                $letterCount[$letter] = 1;
            }
        }
    
        $mostFrequentLetter = null;
        $maxCount = 0;
    
        foreach ($letterCount as $letter => $count) {
            if ($count > $maxCount) {
                $mostFrequentLetter = $letter;
                $maxCount = $count;
            }
        }
    
        if ($mostFrequentLetter !== null) {
            return response()->json(['message' => "Huruf $mostFrequentLetter muncul sebanyak $maxCount kali"], 200);
        } else {
            return response()->json(['message' => 'Tidak ada huruf yang muncul'], 400);
        }
    }

    function matriksInverse(Request $request) {
        $n = $request->array;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $array[$i][$j] = ($i == $j) ? $n : 0;
            }
        }
    
        foreach ($array as $row) {
            echo implode(' ', $row) . PHP_EOL;
        }
    }
}
