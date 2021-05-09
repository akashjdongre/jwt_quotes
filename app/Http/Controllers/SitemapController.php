<?php

namespace App\Http\Controllers;

use App\Author;
use App\Quote;
use App\Blog;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index() {
        $blogs = Blog::all()->first();
        $categories = Category::all()->first();
        $tags = Tag::all()->first();
        $authors = Author::all()->first();
        $quotes = Quote::all()->first();
        return response()->view('sitemap.index', [
            'blogs' => $blogs,
            'categories' => $categories,
            'tags' => $tags,
            'authors' => $authors,
            'quotes' => $quotes,
        ])->header('Content-Type', 'text/xml');
    }


    public function blogs() {
        $blogs = Blog::latest()->get();
        return response()->view('sitemap.blogs', [
            'blogs' => $blogs,
        ])->header('Content-Type', 'text/xml');
    }


    public function quotes() {
        $text = Quote::where('text','!=',null)->latest()->get();
        $image = Quote::where('image','!=',null)->latest()->get();
        $gif = Quote::where('gif','!=',null)->latest()->get();
        $video = Quote::where('video','!=',null)->latest()->get();
        return response()->view('sitemap.quotes', [
            'text' => $text,
            'image'=> $image,
            'gif' => $gif,
            'video'=>$video
        ])->header('Content-Type', 'text/xml');
    }
 
    public function categories() {
        $categories = Category::all();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function authors() {
        $authors = Author::all();
        return response()->view('sitemap.authors', [
            'authors' => $authors,
        ])->header('Content-Type', 'text/xml');
    }
 
    public function tags() {
        $tags = Tag::all();
        return response()->view('sitemap.tags', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }
    // $content->created_at->tz('UTC')->toAtomString()
    public function pages() {
       
        return response()->view('sitemap.pages')->header('Content-Type', 'text/xml');
    }


}
