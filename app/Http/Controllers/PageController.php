<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\View;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            return view('notfound');
        }

        //Background
        $bg = '';
        switch ($page->op_bg_type) {
            case 'image':
                $bg = "url('" . url('/media/uploads') . '/' . $$page->op_bg_value . "')";
                break;

            case 'color':
                $colors = explode(',', $page->op_bg_value);
                $bg = 'linear-gradient(90deg,';
                $bg .= $colors[0] . ',';
                $bg .= !empty($colors[1]) ? $colors[1] : $colors[0];
                $bg .= ')';
                break;
        }

        //Links
        $links = Link::where('page_id', $page->id)->where('status', 1)->orderBy('order')->get();

        //Registrar views
        $view = View::firstOrNew(
            ['page_id' => $page->id, 'view_date' => date('Y-m-d')]
        );
        $view->total++;
        $view->save();

        $data = [
            'slug'          => $page->slug,
            'font_color'    => $page->op_bg_color,
            'bg_value'      => $page->op_bg_value,
            'profile_image' => url('/media/uploads') . '/' . $page->op_profile_image,
            'title'         => $page->op_title,
            'description'   => $page->op_description,
            'fb_pixel'      => $page->op_fb_pixel,
            'bg'            => $bg,
            'links'         => $links
        ];

        return view('page.index', compact('data'));
    }

    public function store()
    {

    }
}
