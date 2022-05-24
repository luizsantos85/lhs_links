<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;


class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page){
            return view('notfound');
        }
        //Background
        $bg = '';


        //Links
        $links = [];

        $data = [
            'slug'          => $page->slug,
            'font_color'    => $page->op_bg_color,
            'bg_value'      => $page->op_bg_value,
            'profile_image' => url('/media/uploads') . '/' . $page->op_profile_image,
            'title'         => $page->op_title,
            'description'   => $page->op_description,
            'fb_pixel'      => $page->op_fb_pixel,
            'bg'            =>$bg,
            'links'         => $links
        ];

        return view('page.index', compact('data'));
    }
}
