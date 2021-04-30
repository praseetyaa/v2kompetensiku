<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ajifatur\FaturCMS\Models\Halaman;

class HalamanController extends Controller
{
    /**
     * Menampilkan detail halaman
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $permalink)
    {
        // Referral
        referral($request->query('ref'), 'site.halaman.detail', ['permalink' => $permalink]);

    	// Data halaman
    	$halaman = Halaman::where('halaman_permalink','=',$permalink)->firstOrFail();

        if($halaman->halaman_tipe == 1){
            // View
            return view('front.halaman.detail', [
            	'halaman' => $halaman,
            ]);
        }
        elseif($halaman->halaman_tipe == 2){
            // View
            return view('page.'.$halaman->konten, [
                'halaman' => $halaman,
            ]);
        }
    }
}