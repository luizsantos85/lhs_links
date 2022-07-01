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

    public function linkOrderUpdate($linkid, $pos)
    {
        $user = Auth::user();
        $link = Link::find($linkid);

        $myPages = [];
        $myPagesQuery = Page::where('user_id', $user->id)->get();

        foreach ($myPagesQuery as $pageItem) {
            $myPages[] = $pageItem->id;
        }

        if (in_array($link->page_id, $myPages)) {
            if ($link->order > $pos) {
                $afterLinks = Link::where('page_id', $link->page_id)
                    ->where('order', '>=', $pos)->get();
                foreach ($afterLinks as $afterLink) {
                    $afterLink->order++;
                    $afterLink->save();
                }
            } elseif ($link->order < $pos) {
                $beforeLinks = Link::where('page_id', $link->page_id)
                    ->where('order', '<=', $pos)->get();
                foreach ($beforeLinks as $beforeLink) {
                    $beforeLink->order--;
                    $beforeLink->save();
                }
            }

            $link->order = $pos;
            $link->save();

            $allLinks = Link::where('page_id', $link->page_id)->orderBy('order', 'ASC')->get();
            foreach ($allLinks as $linkKey => $linkItem) {
                $linkItem->order = $linkKey;
                $linkItem->save();
            }
        }

        return;
    }
}
