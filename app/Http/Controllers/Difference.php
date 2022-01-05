<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NaturalNumbers;
use Illuminate\Support\Facades\DB;

class Difference extends Controller
{
    /**
     * Should emit JSON in the following format
     *  {
     *      "datetime":current_datetime,
     *      "value":solution,
     *      "number":n,
     *      "occurrences":occurrences // the number of times n has been requested
     *   }
     *
     * @param NaturalNumbers $naturalNumbers
     * @param Request $request
     * @param integer $n
     * @return \Illuminate\Http\Response
     */
    public function difference(NaturalNumbers $naturalNumbers, Request $request, int $n)
    {
        try {
            // increment +1
            DB::table('number_occurrences')->where('id',$n)->increment('occurrences');
            return response()->json([
                'datetime' => date('c'), // ISO 8601 date
                'value' => $naturalNumbers->difference($n),
                'number' => $n,
                'occurrences' => intval(DB::table('number_occurrences')->select('occurrences')->where('id',$n)->first()->occurrences),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'success'=>false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
