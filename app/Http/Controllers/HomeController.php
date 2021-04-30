<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Ajifatur\FaturCMS\Models\Blog;
use Ajifatur\FaturCMS\Models\Mitra;
use Ajifatur\FaturCMS\Models\Program;
use Ajifatur\FaturCMS\Models\Slider;

class HomeController extends Controller
{		
    /**
     * Home Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Referral
        referral($request->query('ref'), 'site.home');

        // Data slider
        $slider = Slider::where('status_slider','=',1)->orderBy('order_slider','asc')->get();

        // Data program
        $program = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->orderBy('program_at', 'desc')->limit(12)->get();

        // Data mitra
        $mitra = Mitra::orderBy('order_mitra','asc')->get();

        // Data artikel terbaru
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kategori_artikel','blog.blog_kategori','=','kategori_artikel.id_ka')->orderBy('blog_at','desc')->limit(3)->get();

        // View
        return view('front.home', [
            'artikel' => $artikel,
            'mitra' => $mitra,
            'program' => $program,
            'slider' => $slider,
		]);
    }

    /**
     * Search Page
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Keyword dan kategori
        $q = $request->query('q');

        // Data artikel
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kategori_artikel','blog.blog_kategori','=','kategori_artikel.id_ka')->where('blog_title','like','%'.$q.'%')->orderBy('blog_at','desc')->paginate(12);
        
        // Data program
        $program = Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_title','like','%'.$q.'%')->orderBy('program_at','desc')->paginate(12);

        // View
        return view('front.search', [
            'artikel' => $artikel,
            'program' => $program,
        ]);
    }
}
