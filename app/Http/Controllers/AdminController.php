<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\Link;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $pages = Page::where('user_id', $user->id)->get();

        return view('admin.index', compact('pages'));
    }

    public function pageLinks($slug)
    {
        $menu = 'links';
        $user = Auth::user();
        $page = Page::where('slug', $slug)->where('user_id', $user->id)->first();

        if (!$page) {
            return redirect()->route('admin.index');
        }

        $links = Link::where('page_id', $page->id)->orderBy('order', 'ASC')->get();

        return view('admin.page_links', compact('menu', 'page', 'links'));
    }

    public function pageDesign($slug)
    {
        $menu = 'design';

        return view('admin.page_links', compact('menu'));
    }
    public function pageStats($slug)
    {
        $menu = 'stats';

        return view('admin.page_links', compact('menu'));
    }
}
