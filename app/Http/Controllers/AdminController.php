<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function newLink($slug)
    {
        $menu = 'links';
        $user = Auth::user();
        $page = Page::where('slug', $slug)->where('user_id', $user->id)->first();
        $page = Page::where('slug', $slug)->where('user_id', $user->id)->first();

        if (!$page) {
            return redirect()->route('admin.index');
        }

        return view('admin.page_edit', compact('page', 'menu'));
    }

    public function newLinkAction($slug, Request $request)
    {
        $user = Auth::user();
        $page = Page::where('slug', $slug)->where('user_id', $user->id)->first();

        if (!$page) {
            return redirect()->route('admin.index');
        }

        $fields = $request->validate([
            'status' => ['required', 'boolean'],
            'title' => ['required', 'min:2'],
            'href' => ['required', 'url'],
            'op_bg_color' => ['required', 'regex:/^[#][0-9a-f]{3,6}$/i'],
            'op_text_color' => ['required', 'regex:/^[#][0-9a-f]{3,6}$/i'],
            'op_border_type' => ['required', Rule::in(['square', 'rounded'])]
        ]);

        $totalLinks = Link::where('page_id', $page->id)->count();

        $newLink = new Link();
        $newLink->page_id = $page->id;
        $newLink->status = $fields['status'];
        $newLink->order = $totalLinks;
        $newLink->title = $fields['title'];
        $newLink->href = $fields['href'];
        $newLink->op_bg_color = $fields['op_bg_color'];
        $newLink->op_text_color = $fields['op_text_color'];
        $newLink->op_border_type = $fields['op_border_type'];
        $newLink->save();

        return redirect()->route('admin.links', $page->slug);
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
