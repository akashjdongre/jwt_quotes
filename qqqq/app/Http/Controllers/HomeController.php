<?php

namespace App\Http\Controllers;

use App\Author;
use App\Blog;
use App\Category;
use App\Helpers\Helper;
use App\Keyword;
use App\Quote;
use App\Social;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function about(){
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);
        return view('front.about',compact('setting','headCategories','footerCategories'));
    }

    public function contact(){
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);
        return view('front.contact',compact('setting','headCategories','footerCategories'));
    }

    public function copyright(){
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);
        return view('front.copyright',compact('setting','headCategories','footerCategories'));
    }

    public function privacy(){
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);
        return view('front.privacy-policy',compact('setting','headCategories','footerCategories'));
    }



    /**
     * Show Home Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        list($headCategories,  $footerCategories ,
            $trendTags, $popularTags ,
            $latestTextQuotes,$trendingTextQuotes,$latestImageQuotes,
            $trendImageQuotes,$gifQuotes,$videoQuotes,$popularAuthors,$topCats,$setting )=$this->homePageData();


        // fetch text quote data by render
        $quotes=$latestTextQuotes;
        $latestTextCount=$latestTextQuotes->count();
        $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();

        $quotes=$trendingTextQuotes;
        $trendingTextCount=$trendingTextQuotes->count();
        $trendingTextQuotes = view('front.text')->with('quotes',$quotes)->render();

        // fetch image quote data by render
        $quotes=$trendImageQuotes;
        $trendImageCount=$trendImageQuotes->count();
        $trendImageQuotes = view('front.image')->with('quotes',$quotes)->render();

        $quotes=$latestImageQuotes;
        $latestImageCount=$latestImageQuotes->count();
        $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

        $quotes=$gifQuotes;
        $gifQuotesCount=$gifQuotes->count();
        $gifQuotes = view('front.gif')->with('quotes',$quotes)->render();

        $quotes=$videoQuotes;
        $videoQuotesCount=$videoQuotes->count();
        $videoQuotes = view('front.thumb')->with('quotes',$quotes)->render();


        return view('front.home')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('trendTags',$trendTags)
            ->with('popularTags',$popularTags)
            ->with('latestTextQuotes',$latestTextQuotes)
            ->with('trendingTextQuotes',$trendingTextQuotes)
            ->with('latestImageQuotes',$latestImageQuotes)
            ->with('trendImageQuotes',$trendImageQuotes)
            ->with('gifQuotes',$gifQuotes)
            ->with('videoQuotes',$videoQuotes)
            ->with('latestTextCount',$latestTextCount)
            ->with('trendingTextCount',$trendingTextCount)
            ->with('latestImageCount',$latestImageCount)
            ->with('trendImageCount',$trendImageCount)
            ->with('gifQuotesCount',$gifQuotesCount)
            ->with('videoQuotesCount',$videoQuotesCount)
            ->with('popularAuthors',$popularAuthors)
            ->with('topCats',$topCats)
            ->with('setting',$setting)
            ->with('page','home');

    }


    /**
     * Fetch Home Page Data
     *
     * @return array
     */
    public function homePageData(){

        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(25);

        // fetching top categories
        $topCats=Helper::topCategories(25);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch trending tags
        $trendTags=Helper::trendingTags(30);

        // fetching popular tags
        $popularTags=Helper::popularTags(30);

        // fetching popular tags
        $popularAuthors=Helper::popularAuthors(30);

        // fetching latest quotes with text
        $latestTextQuotes =Helper::fetchQuotes(7,'text','desc');

        // fetching trending quotes with text
        $trendingTextQuotes =Helper::fetchTrendingQuotes(7,'text');

        // fetching quotes with images
        $latestImageQuotes =Helper::fetchQuotes(6,'image','desc');

        // fetching trending quotes with images
        $trendImageQuotes=Helper::fetchTrendingQuotes(6,'image');

        // fetching quotes with images
        $gifQuotes =Helper::fetchQuotes(6,'gif','desc');

        // fetching quotes with images
        $videoQuotes =Helper::fetchQuotes(6,'video','desc');

        return [
            $headCategories, $footerCategories ,
            $trendTags , $popularTags,
            $latestTextQuotes ,$trendingTextQuotes,$latestImageQuotes,$trendImageQuotes,$gifQuotes,
            $videoQuotes,$popularAuthors,$topCats,$setting
        ];

    }


    /**
     * Show Single Tag Page
     *
     */
    public function tag($url)
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetching popular tags
        $popularAuthors=Helper::popularAuthors(30);

        // fetching popular tags
        $popularTags=Helper::popularTags(30);

        // fetch single tag
        $tag=Helper::singleTag('url',$url);

        // fetch related tags
        $relatedTags=Helper::RelatedTags(35,'url',$url);

        // fetch related text
        $textQuotes=Helper::quotesByTag('url',$url,'text','created_at','desc',50,'','');

        // fetch related pitures
        $relatedPictures=Helper::quotesByTag('url',$url,'image','created_at','desc',6,'','');

        // fetch text data by render
        $quotes=$textQuotes;
        $textCount=$textQuotes->count();
        $textQuotes = view('front.text')->with('quotes',$quotes)->render();

        // fetch image data by render
        $quotes=$relatedPictures;
        $relatedPicturesCount=$relatedPictures->count();
        $relatedPictures = view('front.image')->with('quotes',$quotes)->render();


        return view('front.tag',compact('tag','headCategories','footerCategories',
            'popularTags','popularAuthors','relatedTags','textQuotes','relatedPictures',
        'textCount','relatedPicturesCount','setting'));
    }


    /**
     * Show Single Text Page
     *
     */
    public function singleText(Request $request,$url)
    {
        if ($request->ajax == true) {

            $singleQuote = Helper::quoteByUrl($url);

            $total = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc', '', '', '', $singleQuote->id);

            $quotes = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc', '', $request->skip, $request->take, $singleQuote->id);
            // fetching latest quotes with text

            // fetch text data by render
            $renderQuotes = view('front.image')
                ->with('quotes', $quotes)->render();

            $hide = 'no';
            $totalSkip = $request->skip + $request->take;
            if ($totalSkip >= $total->count()) {
                $hide = 'yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' => $renderQuotes,
                'skipValue' => $request->skip + $request->take,
                'hide' => $hide
            ]);


        } else {

            // fetch settings
            $setting = Helper::settings();

            // fetch header category
            $headCategories = Helper::headerCategories(5);

            // fetch footer category
            $footerCategories = Helper::footerCategories(50);

            // fetching popular tags
            $popularTags = Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors = Helper::popularAuthors(30);

            $singleQuote = Helper::quoteByUrl($url);

            // fetch related pitures
            $relatedText = Helper::relatedQuotes($singleQuote->tags, 'text', 'created_at', 'desc','', '', '', $singleQuote->id);

            // fetch related pitures
           // $allRelatePictures = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc','', '', '', $singleQuote->id);

            // fetch image data by render
            $quotes = $relatedText;
            $relatedTextCount = $relatedText->count();
            $relatedText = view('front.text')->with('quotes', $quotes)->render();

            return view('front.single-text')
                ->with('singleQuote', $singleQuote)
                ->with('relatedText', $relatedText)
                ->with('relatedTextCount', $relatedTextCount)
                ->with('popularTags', $popularTags)
                ->with('popularAuthors', $popularAuthors)
                ->with('headCategories', $headCategories)
                ->with('footerCategories', $footerCategories)
                ->with('setting', $setting)
                ->with('url', route('single-text', ['url' => $url]))
                ->with('take', 15);
        }
    }
    



    /**
     * Show Single Picture Page
     *
     */
    public function singleImage(Request $request,$url)
    {
        if ($request->ajax == true) {

            $singleQuote = Helper::quoteByUrl($url);

            $total = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc', '', '', '', $singleQuote->id);

            $quotes = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc', '', $request->skip, $request->take, $singleQuote->id);
            // fetching latest quotes with text

            // fetch text data by render
            $renderQuotes = view('front.image')
                ->with('quotes', $quotes)->render();

            $hide = 'no';
            $totalSkip = $request->skip + $request->take;
            if ($totalSkip >= $total->count()) {
                $hide = 'yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' => $renderQuotes,
                'skipValue' => $request->skip + $request->take,
                'hide' => $hide
            ]);


        } else {

            // fetch settings
            $setting = Helper::settings();

            // fetch header category
            $headCategories = Helper::headerCategories(5);

            // fetch footer category
            $footerCategories = Helper::footerCategories(50);

            // fetching popular tags
            $popularTags = Helper::popularTags(90);

            // fetching popular tags
            $popularAuthors = Helper::popularAuthors(90);

            $singleQuote = Helper::quoteByUrl($url);

            // fetch related pitures
            $relatedPictures = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc', 6, '', '', $singleQuote->id);

            // fetch related pitures
            $allRelatePictures = Helper::relatedQuotes($singleQuote->tags, 'image', 'created_at', 'desc','', '', '', $singleQuote->id);

            // fetch image data by render
            $quotes = $relatedPictures;
            $relatedPicturesCount = $relatedPictures->count();
            $relatedPictures = view('front.image')->with('quotes', $quotes)->render();

            return view('front.single-image')
                ->with('singleQuote', $singleQuote)
                ->with('allRelatePictures', $allRelatePictures)
                ->with('relatedPictures', $relatedPictures)
                ->with('relatedPicturesCount', $relatedPicturesCount)
                ->with('popularTags', $popularTags)
                ->with('popularAuthors', $popularAuthors)
                ->with('headCategories', $headCategories)
                ->with('footerCategories', $footerCategories)
                ->with('setting', $setting)
                ->with('url', route('single-image', ['url' => $url]))
                ->with('take', 15);
        }
    }


    /**
     * Show Single Blog Page
     *
     */
    public function singleBlog(Request $request,$url)
    {
        if ($request->ajax == true) {

            $singleBlog = Helper::blogByUrl($url);

            $total = Helper::fetchBlogs('', 'desc', '', '', 'category', $singleBlog->category);

            // fetching latest quotes with text
            $blogs = Helper::fetchBlogs('', 'desc', $request->skip, $request->take,'category',$singleBlog->category);

            // fetch text data by render
            $renderQuotes = view('front.fetch-blog')
                ->with('blogs', $blogs)->render();

            $hide = 'no';
            $totalSkip = $request->skip + $request->take;
            if ($totalSkip >= $total->count()) {
                $hide = 'yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' => $renderQuotes,
                'skipValue' => $request->skip + $request->take,
                'hide' => $hide
            ]);


        } else {


            // fetch settings
            $setting = Helper::settings();

            // fetch header category
            $headCategories = Helper::headerCategories(5);

            // fetch footer category
            $footerCategories = Helper::footerCategories(50);

            // fetching popular tags
            $popularTags=Helper::popularTags(90);

            // fetching popular Authors
            $popularAuthors=Helper::popularAuthors(90);

            $singleBlog = Helper::blogByUrl($url);

            $similarBlogs = Helper::fetchBlogs('6', 'desc', '', '', 'category', $singleBlog->category);

            // fetch videos data by render
            $blogs=$similarBlogs;
            $similarBlogsCount=$similarBlogs->count();
            $similarBlogs = view('front.fetch-blog')->with('blogs',$blogs)->render();


            return view('front.read-blog')
                ->with('singleBlog',$singleBlog)
                ->with('similarBlogs',$similarBlogs)
                ->with('similarBlogsCount',$similarBlogsCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('type','Article')
                ->with('url',route('single-blog',['url'=>$url]))
                ->with('take',15);

        }
    }


    /**
     * Show Single GIF Page
     *
     */
    public function singleGif(Request $request,$url)
    {
        if ($request->ajax == true) {

            $singleQuote = Helper::quoteByUrl($url);

            $total = Helper::relatedQuotes($singleQuote->tags, 'gif', 'created_at', 'desc','' , '', '', $singleQuote->id);

            $quotes=Helper::relatedQuotes($singleQuote->tags, 'gif', 'created_at', 'desc','' , $request->skip, $request->take, $singleQuote->id);
            // fetching latest quotes with text

            // fetch text data by render
            $renderQuotes = view('front.gif')
                ->with('quotes', $quotes)->render();

            $hide = 'no';
            $totalSkip = $request->skip + $request->take;
            if ($totalSkip >= $total->count()) {
                $hide = 'yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' => $renderQuotes,
                'skipValue' => $request->skip + $request->take,
                'hide' => $hide
            ]);


        } else {
            // fetch settings
            $setting = Helper::settings();

            // fetch header category
            $headCategories = Helper::headerCategories(5);

            // fetch footer category
            $footerCategories = Helper::footerCategories(50);

            // fetching popular tags
            $popularTags = Helper::popularTags(90);

            // fetching popular tags
            $popularAuthors = Helper::popularAuthors(90);

            $singleQuote = Helper::quoteByUrl($url);

            // fetch related pitures
            $relatedPictures = Helper::relatedQuotes($singleQuote->tags, 'gif', 'created_at', 'desc', 6, '', '', $singleQuote->id);

            // fetch related pitures
            $allRelatePictures = Helper::relatedQuotes($singleQuote->tags, 'gif', 'created_at', 'desc','', '', '', $singleQuote->id);

            // fetch image data by render
            $quotes = $relatedPictures;
            $relatedPicturesCount = $relatedPictures->count();
            $relatedPictures = view('front.gif')->with('quotes', $quotes)->render();

            return view('front.single-gif')
                ->with('singleQuote', $singleQuote)
                ->with('relatedPictures', $relatedPictures)
                ->with('allRelatePictures', $allRelatePictures)
                ->with('relatedPicturesCount', $relatedPicturesCount)
                ->with('popularTags', $popularTags)
                ->with('popularAuthors', $popularAuthors)
                ->with('headCategories', $headCategories)
                ->with('footerCategories', $footerCategories)
                ->with('setting', $setting)
                ->with('url', route('single-gif', ['url' => $url]))
                ->with('take', 15);
        }
    }


    /**
     * Show Single Video Page
     *
     */
    public function singleVideo(Request $request,$url)
    {

        if ($request->ajax == true) {

            $singleQuote = Helper::quoteByUrl($url);

            $total = Helper::relatedQuotes($singleQuote->tags, 'video', 'created_at', 'desc', '', '', '', $singleQuote->id);

            $quotes = Helper::relatedQuotes($singleQuote->tags, 'video', 'created_at', 'desc', '', $request->skip, $request->take, $singleQuote->id);
            // fetching latest quotes with text

            // fetch text data by render
            $renderQuotes = view('front.thumb')
                ->with('quotes', $quotes)->render();

            $hide = 'no';
            $totalSkip = $request->skip + $request->take;
            if ($totalSkip >= $total->count()) {
                $hide = 'yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' => $renderQuotes,
                'skipValue' => $request->skip + $request->take,
                'hide' => $hide
            ]);


        } else {
            // fetch settings
            $setting = Helper::settings();

            // fetch header category
            $headCategories = Helper::headerCategories(5);

            // fetch footer category
            $footerCategories = Helper::footerCategories(50);

            // fetching popular tags
            $popularTags = Helper::popularTags(90);

            // fetching popular tags
            $popularAuthors = Helper::popularAuthors(90);

            $singleQuote = Helper::quoteByUrl($url);

            // fetch related quotes
            $relatedVideos = Helper::relatedQuotes($singleQuote->tags, 'video', 'created_at', 'desc', 6, '', '', $singleQuote->id);

            // fetch videos data by render
            $quotes = $relatedVideos;
            $relatedVideosCount = $relatedVideos->count();
            $relatedVideos = view('front.thumb')->with('quotes', $quotes)->render();

            return view('front.single-video')
                ->with('singleQuote', $singleQuote)
                ->with('relatedVideos', $relatedVideos)
                ->with('relatedVideosCount', $relatedVideosCount)
                ->with('popularTags', $popularTags)
                ->with('popularAuthors', $popularAuthors)
                ->with('headCategories', $headCategories)
                ->with('footerCategories', $footerCategories)
                ->with('setting', $setting)
                ->with('url', route('single-video', ['url' => $url]))
                ->with('take', 15);
        }
    }



    /**
     * Show Single Tag Page
     *
     */
    public function blog(Request $request)
    {

        if($request->ajax == true){

            $total =Helper::fetchBlogs();

            // fetching latest quotes with text
            $blogs =Helper::fetchBlogs('','desc',$request->skip,$request->take);

            // fetch text data by render
            $renderQuotes = view('front.fetch-blog')
                ->with('blogs',$blogs)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetching popular tags
            $popularTags=Helper::popularTags(90);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(90);

            $Blogs=Helper::fetchBlogs(9,'desc');

            // fetch videos data by render
            $blogs=$Blogs;
            $blogsCount=$Blogs->count();
            $blogs = view('front.fetch-blog')->with('blogs',$blogs)->render();


            return view('front.blog')
                ->with('blogs',$blogs)
                ->with('blogsCount',$blogsCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('type','Article')
                ->with('url',route('blog'))
                ->with('take',15);
        }
    }




    /**
     * Show Single Category Page
     *
     */
    public function category($url)
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetching top categories
        $topCats=Helper::topCategories(25);

         // fetch single tag
        $category=Helper::singleCategory('url',$url);

        // sub categories
        $subCategories=Helper::subCategories($category->id,30);

        // fetching popular tags
        $popularAuthors=Helper::popularAuthors(30);

        // fetching popular tags
        $popularTags=Helper::popularTags(30);

        // fetch related tags
        $relatedTags=Helper::RelatedTagsByCategory(35,'url',$url);

        // fetch related text
        $textQuotes=Helper::quotesByCategory('url',$url,'text','created_at','desc',50,'','');

        // fetch related pitures
        $relatedPictures=Helper::quotesByCategory('url',$url,'image','created_at','desc',6,'','');

        // fetch text data by render
        $quotes=$textQuotes;
        $textCount=$textQuotes->count();
        $textQuotes = view('front.text')->with('quotes',$quotes)->render();

        // fetch image data by render
        $quotes=$relatedPictures;
        $relatedPicturesCount=$relatedPictures->count();
        $relatedPictures = view('front.image')->with('quotes',$quotes)->render();


        return view('front.category',compact('category','footerCategories','subCategories','topCats',
            'popularTags','popularAuthors','relatedTags','textQuotes','relatedPictures',
            'textCount','relatedPicturesCount','setting'));
    }



    /**
     * Show Single Author Page
     *
     */
    public function author($url)
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetching popular tags
        $popularAuthors=Helper::popularAuthors(30);

        // fetching popular tags
        $popularTags=Helper::popularTags(30);

        // fetch single tag
        $author=Helper::singleAuthor('url',$url);

        // fetch other authors
        $otherAuthors=Helper::otherAuthors('url',$url,25);

        // fetch trending tags
        $trendTags=Helper::trendingTags(30);

        // fetch related text
        $textQuotes=Helper::quotesByAuthor('url',$url,'text','created_at','desc',50,'','');

        // fetch related pictures
        $relatedPictures=Helper::quotesByAuthor('url',$url,'image','created_at','desc',6,'','');

        // fetch text data by render
        $quotes=$textQuotes;
        $textCount=$textQuotes->count();
        $textQuotes = view('front.text')->with('quotes',$quotes)->render();

        // fetch image data by render
        $quotes=$relatedPictures;
        $relatedPicturesCount=$relatedPictures->count();
        $relatedPictures = view('front.image')->with('quotes',$quotes)->render();

        $type="Article";

        return view('front.author',compact('author','headCategories','footerCategories','popularTags','popularAuthors','textQuotes',
            'relatedPictures','textCount','relatedPicturesCount','otherAuthors','trendTags','setting','type'));

    }


    /**
     * Show latest Text Page
     *
     */
    public function allText(Request $request)
    {

        if($request->ajax == true){

            $total =Helper::fetchQuotesAsTags('','text','','','');

            // fetching latest quotes with text
            $quotes =Helper::fetchQuotesAsTags('','text','',$request->skip,$request->take);

            // fetch text data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching latest quotes with text
            $latestTextQuotes =Helper::fetchQuotesAsTags('40','text','');

            // fetch text data by render
            $quotes=$latestTextQuotes;
            $latestTextCount=$latestTextQuotes->count();
            $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();


            return view('front.text-page')
                ->with('page','AllText')
                ->with('textQuotes',$latestTextQuotes)
                ->with('textCount',$latestTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','All Text Quotes')
                ->with('url',route('all-text'))
                ->with('take',30);
        }

    }



    /**
     * Show latest Text Page
     *
     */
    public function latestText(Request $request)
    {

        if($request->ajax == true){

            $total =Helper::fetchQuotes('','text','desc','','');

            // fetching latest quotes with text
            $quotes =Helper::fetchQuotes('','text','desc',$request->skip,$request->take);

            // fetch text data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching latest quotes with text
            $latestTextQuotes =Helper::fetchQuotes(50,'text','desc');

            // fetch text data by render
            $quotes=$latestTextQuotes;
            $latestTextCount=$latestTextQuotes->count();
            $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();


            return view('front.text-page')
                ->with('textQuotes',$latestTextQuotes)
                ->with('textCount',$latestTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','Latest')
                ->with('url',route('latest-text'))
                ->with('take',30);
        }

    }


    /**
     * Show Trending Tag Page
     *
     */
    public function trendText(Request $request)
    {
        if($request->ajax == true){

            $total =Helper::fetchTrendingQuotes('','text','','','');
            $quotes =Helper::fetchTrendingQuotes('','text','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching trending quotes with text
            $trendingTextQuotes =Helper::fetchTrendingQuotes(50,'text');

            // fetch text data by render
            $quotes=$trendingTextQuotes;
            $trendingTextCount=$trendingTextQuotes->count();
            $trendingTextQuotes = view('front.text')->with('quotes',$quotes)->render();

            return view('front.text-page')
                ->with('textQuotes',$trendingTextQuotes)
                ->with('textCount',$trendingTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','Trending')
                ->with('url',route('trend-text'))
                ->with('take',30);
        }
    }

    /**
     * Show Tag text More Page
     *
     */
    public function tagTextMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByTag('url',$url,'text','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByTag('url',$url,'text','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Tag::class,'url',$url);
            $title=$data->title;

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching latest quotes with text
            $latestTextQuotes =Helper::quotesByTag('url',$url,'text','created_at','desc',50);

            // fetch text data by render
            $quotes=$latestTextQuotes;
            $latestTextCount=$latestTextQuotes->count();
            $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();

            return view('front.text-page')
                ->with('data',$data)
                ->with('textQuotes',$latestTextQuotes)
                ->with('textCount',$latestTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('tag-text-more',['url'=> $url ]))
                ->with('take',30);
        }

    }


    /**
     * Show Category text More Page
     *
     */
    public function categoryTextMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByCategory('url',$url,'text','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByCategory('url',$url,'text','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Category::class,'url',$url);
            $title=$data->name;

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching latest quotes with text
            $latestTextQuotes =Helper::quotesByCategory('url',$url,'text','created_at','desc',50);

            // fetch text data by render
            $quotes=$latestTextQuotes;
            $latestTextCount=$latestTextQuotes->count();
            $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();


            return view('front.text-page')
                ->with('data',$data)
                ->with('textQuotes',$latestTextQuotes)
                ->with('textCount',$latestTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('category-text-more',['url'=> $url ]))
                ->with('take',30);
        }

    }


    /**
     * Show Author text More Page
     *
     */
    public function authorTextMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByAuthor('url',$url,'text','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByAuthor('url',$url,'text','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.text')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Author::class,'url',$url);
            $title=$data->name;

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(30);

            // fetching latest quotes with text
            $latestTextQuotes =Helper::quotesByAuthor('url',$url,'text','created_at','desc',50);

            // fetch text data by render
            $quotes=$latestTextQuotes;
            $latestTextCount=$latestTextQuotes->count();
            $latestTextQuotes = view('front.text')->with('quotes',$quotes)->render();

            return view('front.text-page')
                ->with('data',$data)
                ->with('textQuotes',$latestTextQuotes)
                ->with('textCount',$latestTextCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('author-text-more',['url'=> $url ]))
                ->with('take',30);
        }

    }



    /**
     * Show Tag Image More Page
     *
     */
    public function tagImageMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByTag('url',$url,'image','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByTag('url',$url,'image','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Tag::class,'url',$url);
            $title=$data->title;

            // fetch settings
            $setting=Helper::settings();

                // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching latest quotes with image
            $latestImageQuotes =Helper::quotesByTag('url',$url,'image','created_at','desc',9);

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('data',$data)
                ->with('topCats',$topCats)
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('tag-image-more',['url'=> $url ]))
                ->with('take',15);
        }

    }



    /**
     * Show Author Image More Page
     *
     */
    public function authorImageMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByAuthor('url',$url,'image','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByAuthor('url',$url,'image','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Author::class,'url',$url);
            $title=$data->name;

            // fetch settings
            $setting=Helper::settings();

                // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching latest quotes with image
            $latestImageQuotes =Helper::quotesByAuthor('url',$url,'image','created_at','desc',9);

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('data',$data)
                ->with('topCats',$topCats)
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('author-image-more',['url'=> $url ]))
                ->with('take',15);
        }

    }


    /**
     * Show Category Image More Page
     *
     */
    public function categoryImageMore($url,Request $request)
    {
        if($request->ajax == true){

            $total =Helper::quotesByCategory('url',$url,'image','created_at','desc','','','');

            // fetching latest quotes with text
            $quotes =Helper::quotesByCategory('url',$url,'image','created_at','desc','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{
            $data=Helper::fetchDataByModelAndCol(Category::class,'url',$url);
            $title=$data->name;

            // fetch settings
            $setting=Helper::settings();

                // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching latest quotes with image
            $latestImageQuotes =Helper::quotesByCategory('url',$url,'image','created_at','desc',9);

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('data',$data)
                ->with('topCats',$topCats)
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title',$title)
                ->with('url',route('category-image-more',['url'=> $url ]))
                ->with('take',15);
        }

    }


    /**
     * Show latest images Page
     *
     */
    public function latestImages(Request $request)
    {

        if($request->ajax == true){

            $total =Helper::fetchQuotes('','image','desc','','');

            // fetching latest quotes with text
            $quotes =Helper::fetchQuotes('','image','desc',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

                // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching latest quotes with image
            $latestImageQuotes =Helper::fetchQuotes(9,'image','desc');

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('topCats',$topCats)
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','Latest Pictures')
                ->with('url',route('latest-images'))
                ->with('take',15);
        }

    }



    /**
     * Show all images Page
     *
     */
    public function allImages(Request $request)
    {

        if($request->ajax == true){

            // fetching latest quotes with text
            $total =Helper::fetchQuotesAsTags('','image','','','');

            // fetching latest quotes with text
            $quotes =Helper::fetchQuotesAsTags('','image','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

                // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching latest quotes with image
            $latestImageQuotes =Helper::fetchQuotesAsTags(40,'image','');

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('page','AllImage')
                ->with('topCats',$topCats)
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','All Pictures')
                ->with('url',route('all-images'))
                ->with('take',15);
        }

    }



    /**
     * Show all Gif Page
     *
     */
    public function allGif(Request $request)
    {

        if($request->ajax == true){

            // fetching gif quotes
            $total =Helper::fetchQuotesAsTags('','gif','','','');

            // fetching gif quotes
            $quotes =Helper::fetchQuotesAsTags('','gif','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.gif')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching quotes with gif
            $latestImageQuotes =Helper::fetchQuotesAsTags(40,'gif','');

            // fetch image data by render
            $quotes=$latestImageQuotes;
            $latestImageCount=$latestImageQuotes->count();
            $latestImageQuotes = view('front.gif')->with('quotes',$quotes)->render();

            return view('front.gif-page')
                ->with('imageQuotes',$latestImageQuotes)
                ->with('imageCount',$latestImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','All GIF')
                ->with('url',route('all-gif'))
                ->with('take',15);
        }

    }


    /**
     * Show all video Page
     *
     */
    public function allVideo(Request $request)
    {
        if($request->ajax == true){

            // fetching gif quotes
            $total =Helper::fetchQuotesAsTags('','video','','','');

            // fetching gif quotes
            $quotes =Helper::fetchQuotesAsTags('','video','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.video')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching quotes with gif
            $videoQuotes =Helper::fetchQuotesAsTags(3,'video','');

            // fetch image data by render
            $quotes=$videoQuotes;
            $videoQuotesCount=$videoQuotes->count();
            $videoQuotes = view('front.video')->with('quotes',$quotes)->render();

            return view('front.all-videos')
                ->with('videoQuotes',$videoQuotes)
                ->with('videoQuotesCount',$videoQuotesCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','All Videos')
                ->with('url',route('all-video'))
                ->with('take',3);
        }

    }

    /**
     * Show Trending Tag Page
     *
     */
    public function trendImages(Request $request)
    {
        if($request->ajax == true){

            $total =Helper::fetchTrendingQuotes('','image','','','');

            $quotes =Helper::fetchTrendingQuotes('','image','',$request->skip,$request->take);

            // fetch dropdown data by render
            $renderQuotes = view('front.image')
                ->with('quotes',$quotes)->render();

            $hide='no';
            $totalSkip=$request->skip + $request->take;
            if($totalSkip >= $total->count()){
                $hide='yes';
            }

            // return true
            return response()->json([
                'success' => true,
                'quotes' =>  $renderQuotes,
                'skipValue'=>$request->skip + $request->take,
                'hide'=>$hide
            ]);


        }else{

            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(25);

            // fetching top categories
            $topCats=Helper::topCategories(25);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            // fetch trending tags
            $trendTags=Helper::trendingTags(35);

            // fetching popular tags
            $popularTags=Helper::popularTags(30);

            // fetching popular tags
            $popularAuthors=Helper::popularAuthors(35);

            // fetching trending quotes with images
            $trendingImageQuotes =Helper::fetchTrendingQuotes(9,'image');

            // fetch image data by render
            $quotes=$trendingImageQuotes;
            $trendingImageCount=$trendingImageQuotes->count();
            $trendingImageQuotes = view('front.image')->with('quotes',$quotes)->render();

            return view('front.images-page')
                ->with('topCats',$topCats)
                ->with('imageQuotes',$trendingImageQuotes)
                ->with('imageCount',$trendingImageCount)
                ->with('headCategories',$headCategories)
                ->with('footerCategories',$footerCategories)
                ->with('popularTags',$popularTags)
                ->with('trendTags',$trendTags)
                ->with('popularAuthors',$popularAuthors)
                ->with('setting',$setting)
                ->with('title','Trending Pictures')
                ->with('url',route('trend-images'))
                ->with('take',15);
        }
    }


    /**
     * Show Trending Tag Page
     *
     */
    public function trendTags()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch trending tags
        $trendTags=Helper::trendingTags();

        return view('front.trend-tags')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('setting',$setting)
            ->with('tags',$trendTags);
    }


    /**
     * Show Popular Tag Page
     *
     */
    public function popularTags()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch popular tags
        $popularTags=Helper::popularTags('','title','asc');

        return view('front.popular-tags')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('setting',$setting)
            ->with('tags',$popularTags);
    }


    /**
     * Show Popular Authors Page
     *
     */
    public function popularAuthors()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch popular Authors
        $popularAuthors=Helper::popularAuthors('','name','asc');

        return view('front.popular-authors')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('setting',$setting)
            ->with('authors',$popularAuthors);
    }

    /**
     * Show All Authors Page
     *
     */
    public function allAuthors()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch all Authors
        $allAuthors=Helper::allAuthors('','name','asc');

        return view('front.all-authors')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('authors',$allAuthors);
    }


    /**
     * Show All Tags Page
     *
     */
    public function allTags()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch all Tag
        $allTag=Helper::allTags('','title','asc');

        return view('front.all-tags')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('setting',$setting)
            ->with('tags',$allTag);
    }

    /**
     * Show All category Page
     *
     */
    public function allCategory()
    {
        // fetch settings
        $setting=Helper::settings();

        // fetch header category
        $headCategories =Helper::headerCategories(5);

        // fetch footer category
        $footerCategories=Helper::footerCategories(50);

        // fetch all category
        $allCategory=Helper::allCategory('','name','asc');

        return view('front.all-category')
            ->with('headCategories',$headCategories)
            ->with('footerCategories',$footerCategories)
            ->with('setting',$setting)
            ->with('category',$allCategory);
    }


    /**
     * Social default fill
     *
     */
    public function socialFills()
    {

        // fetch trending tags
        $quotes=Quote::all();

        foreach ($quotes as $key => $value) {
          Social::firstOrCreate(['quote_id' => $value->id],['likes' => 0]);
        }

        dd('successfully Fill');
    }

    /**
     * Social default fill
     *
     */
    public function socialFillsDefault()
    {
        // fetch trending tags
        $quotes=Quote::all();

        foreach ($quotes as $key => $value) {
            Social::updateOrCreate(['quote_id' => $value->id],
                ['likes' => 0,'facebook'=>0,'twitter'=>0,'instagram'=>0,'linkedin'=>0,'whatsapp'=>0,
                    'pinterest'=>0,'total_share'=>0]);
        }

        dd('successfully Fill Default');
    }


    /**
     * Authors url default fill
     *
     */
    public function authorsUrlFillsDefault()
    {
        // fetch trending tags
        $authors=Author::all();

        foreach ($authors as $key => $value) {
            $autoUrl=strtolower(str_replace(' ','-',$value->name));
            Author::updateOrCreate(['id' => $value->id],
                ['url' => $autoUrl]);
        }

        dd('successfully Fill Default');
    }


    /**
     * Authors url default fill
     *
     */
    public function quotesUrlFillsDefault()
    {
        // fetch trending tags
        $quote=Quote::all();

        foreach ($quote as $key => $value) {
            $autoUrl='quote-url-for-fill-'.$value->id;
            Quote::updateOrCreate(['id' => $value->id],
                ['url' => $autoUrl]);
        }

        dd('successfully Fill Default');
    }



    /**
     * tags url default fill
     *
     */
    public function tagsUrlFillsDefault()
    {
        // fetch trending tags
        $tags=Tag::all();

        foreach ($tags as $key => $value) {
            $autoUrl=strtolower(str_replace(' ','-',$value->title));
            Tag::updateOrCreate(['id' => $value->id],
                ['url' => $autoUrl]);
        }

        dd('successfully Fill Default');
    }


    /**
     * Social count shares
     *
     */
    public function countShares(Request $request)
    {
        if($request->q && $request->id){

            $social=Social::where('quote_id',$request->id)->first();

            if($request->q=='fb'){
                  $social->facebook=$social->facebook + 1 ;
                  $total=$social->total_share;
                  $total=$total + 1 ;
                  $social->total_share=$total;
                  $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->facebook,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='tw'){
                $social->twitter=$social->twitter + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->twitter,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='insta'){
                $social->instagram=$social->instagram + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->instagram,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='ln'){
                $social->linkedin=$social->linkedin + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->linkedin,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='wa'){
                $social->whatsapp=$social->whatsapp + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->whatsapp,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='likes'){
                $social->likes=$social->likes + 1 ;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->likes,
                    'total'=>  $social->total_share,
                ]);
            }

        }

        // return false
        return response()->json([
            'success' => false,
            'share' => $request->q,
        ]);
    }

    /**
     * Social count shares
     *
     */
    public function countSharesBlog(Request $request)
    {
        if($request->q && $request->id){

            $social=Blog::where('id',$request->id)->first();

            if($request->q=='fb'){
                $social->facebook=$social->facebook + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->facebook,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='tw'){
                $social->twitter=$social->twitter + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->twitter,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='insta'){
                $social->instagram=$social->instagram + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->instagram,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='ln'){
                $social->linkedin=$social->linkedin + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->linkedin,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='wa'){
                $social->whatsapp=$social->whatsapp + 1 ;
                $total=$social->total_share;
                $total=$total + 1 ;
                $social->total_share=$total;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->whatsapp,
                    'total'=>  $social->total_share,
                ]);
            }

            if($request->q=='likes'){
                $social->likes=$social->likes + 1 ;
                $social->save();
                // return true
                return response()->json([
                    'success' => true,
                    'share' => $social->likes,
                    'total'=>  $social->total_share,
                ]);
            }

        }

        // return false
        return response()->json([
            'success' => false,
            'share' => $request->q,
        ]);
    }


    /**
     * Show  search text more
     *
     */
    public function searchTextMore(Request $request)
    {
        if($request->ajax == true){

            if($request->keyword) {
                $string = $request->keyword;

                if($string){
                    $key=$string;
                    $key = preg_replace('/\s+/', ' ', $key);
                    $key= strtolower($key);
                    $keyword = Keyword::firstOrNew(array('title' => $key));
                    $keyword->title = $key;
                    $keyword->count=$keyword->count+1;
                    $keyword->save();
                }

                // split on 1+ whitespace & ignore empty (eg. trailing space)
                $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

                $tags = Tag::select('id')->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('title', 'like', "%{$value}%");
                    }
                })->where('status', 1)->get();


                if(!$tags->isEmpty()){

                    $total = Helper::relatedQuotes($tags, 'text', 'created_at', 'desc', '','','', '');

                    // fetch related text
                    $textQuotes = Helper::relatedQuotes($tags, 'text', 'created_at', 'desc', '', $request->skip, $request->take, '');

                    // fetch text data by render
                    $quotes = $textQuotes;
                    $renderQuotes = view('front.text')->with('quotes', $quotes)->render();

                    $hide='no';
                    $totalSkip=$request->skip + $request->take;
                    if($totalSkip >= $total->count()){
                        $hide='yes';
                    }

                    // return true
                    return response()->json([
                        'success' => true,
                        'quotes' => $renderQuotes,
                        'skipValue' => $request->skip + $request->take,
                        'hide'=>$hide
                    ]);

                }


            }


        }

    }



    /**
     * Show  search text more
     *
     */
    public function searchImageMore(Request $request)
    {

        if($request->ajax == true){

            if($request->keyword) {
                $string = $request->keyword;

                if($string){
                    $key=$string;
                    $key = preg_replace('/\s+/', ' ', $key);
                    $key= strtolower($key);
                    $keyword = Keyword::firstOrNew(array('title' => $key));
                    $keyword->title = $key;
                    $keyword->count=$keyword->count+1;
                    $keyword->save();
                }

                // split on 1+ whitespace & ignore empty (eg. trailing space)
                $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

                $tags = Tag::select('id')->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('title', 'like', "%{$value}%");
                    }
                })->where('status', 1)->get();

                if(!$tags->isEmpty()){

                    $total = Helper::relatedQuotes($tags, 'image', 'created_at', 'desc', '','','', '');

                    // fetch related text
                    $textQuotes = Helper::relatedQuotes($tags, 'image', 'created_at', 'desc', '', $request->skip, $request->take, '');

                    // fetch text data by render
                    $quotes = $textQuotes;
                    $renderQuotes = view('front.image')->with('quotes', $quotes)->render();

                    $hide='no';
                    $totalSkip=$request->skip + $request->take;
                    if($totalSkip >= $total->count()){
                        $hide='yes';
                    }

                    // return true
                    return response()->json([
                        'success' => true,
                        'quotes' => $renderQuotes,
                        'skipValue' => $request->skip + $request->take,
                        'hide'=>$hide,
                        'forSearchViewMore'=>true
                    ]);

                }


            }


        }

    }


    public function search(Request $request){

        if($request->q && $request->ajax == true) {

            $string = $request->q;

            // split on 1+ whitespace & ignore empty (eg. trailing space)
            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            $tags = Tag::select('title')->where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('title', 'like', "%{$value}%");
                }
            })->where('status',1)->limit(10)->get();


            if (!$tags->isEmpty()) {

                // fetch dropdown data by render
                $dropdown_data = view('front.search-dropdown')
                    ->with('tags', $tags)->render();

                // return true
                return response()->json([
                    'success' => true,
                    'dropdown' => $dropdown_data
                ]);

            } else {
                // return false
                return response()->json([
                    'success' => false
                ]);
            }


        }


        if($request->q && !$request->ajax){

            $string = $request->q;

            if($string){
                $key=$string;
                $key = preg_replace('/\s+/', ' ', $key);
                $key= strtolower($key);
                $keyword = Keyword::firstOrNew(array('title' => $key));
                $keyword->title = $key;
                $keyword->count=$keyword->count+1;
                $keyword->save();
            }


            // split on 1+ whitespace & ignore empty (eg. trailing space)
            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            $tags = Tag::select('id')->where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('title', 'like', "%{$value}%");
                }
            })->where('status',1)->limit(10)->get();


            // fetch settings
            $setting=Helper::settings();

            // fetch header category
            $headCategories =Helper::headerCategories(5);

            // fetch footer category
            $footerCategories=Helper::footerCategories(50);

            if(!$tags->isEmpty()){


                if($request->search=='globleSearch'){

                    // fetch related categories by tags
                    $relatedCats=Helper::relatedCategories($tags,'','name','asc','35','','');

                    // fetch related authors by tags
                    $relatedAuthors=Helper::relatedAuthors($tags,'','name','asc','35','','');

                    // fetch related text
                    $textQuotes=Helper::relatedQuotes($tags,'text','created_at','desc','7','','','');

                    // fetch text data by render
                    $quotes=$textQuotes;
                    $textCount=$textQuotes->count();
                    $textQuotes = view('front.text')->with('quotes',$quotes)->render();

                    // fetch related pitures
                    $relatedPictures=Helper::relatedQuotes($tags,'image','created_at','desc',6,'','','');

                    // fetch image data by render
                    $quotes=$relatedPictures;
                    $relatedPicturesCount=$relatedPictures->count();
                    $relatedPictures = view('front.image')->with('quotes',$quotes)->render();

                    return view('front.search')
                        ->with('search',true)
                        ->with('keyword',$request->q)
                        ->with('tags',$tags)
                        ->with('relatedCats',$relatedCats)
                        ->with('relatedAuthors',$relatedAuthors)
                        ->with('headCategories',$headCategories)
                        ->with('footerCategories',$footerCategories)
                        ->with('setting',$setting)
                        ->with('textCount',$textCount)
                        ->with('textQuotes',$textQuotes)
                        ->with('relatedPicturesCount',$relatedPicturesCount)
                        ->with('relatedPictures',$relatedPictures);

                }

                if($request->search=='textSearch'){

                    // fetch related text
                    $textQuotes=Helper::relatedQuotes($tags,'text','created_at','desc','7','','','');

                    // fetch text data by render
                    $quotes=$textQuotes;
                    $textCount=$textQuotes->count();
                    $textQuotes = view('front.text')->with('quotes',$quotes)->render();


                    return view('front.search')
                        ->with('search',true)
                        ->with('keyword',$request->q)
                        ->with('tags',$tags)
                        ->with('headCategories',$headCategories)
                        ->with('footerCategories',$footerCategories)
                        ->with('setting',$setting)
                        ->with('textCount',$textCount)
                        ->with('textQuotes',$textQuotes);

                }


                if($request->search=='pictureSearch'){


                    // fetch related pitures
                    $relatedPictures=Helper::relatedQuotes($tags,'image','created_at','desc',6,'','','');

                    // fetch image data by render
                    $quotes=$relatedPictures;
                    $relatedPicturesCount=$relatedPictures->count();
                    $relatedPictures = view('front.image')->with('quotes',$quotes)->render();


                    return view('front.search')
                        ->with('search',true)
                        ->with('keyword',$request->q)
                        ->with('tags',$tags)
                        ->with('headCategories',$headCategories)
                        ->with('footerCategories',$footerCategories)
                        ->with('setting',$setting)
                        ->with('relatedPicturesCount',$relatedPicturesCount)
                        ->with('relatedPictures',$relatedPictures);

                }




            }else{

                // fetching popular tags
                $popularTags=Helper::popularTags(90);

                // fetching popular tags
                $popularAuthors=Helper::popularAuthors(90);

                // fetch trending tags
                $trendTags=Helper::trendingTags(35);


                // fetching trending quotes with images
                $trendImageQuotes =Helper::fetchTrendingQuotes(9,'image');

                // fetch image data by render
                $quotes=$trendImageQuotes;
                $trendImageCount=$trendImageQuotes->count();
                $trendImageQuotes = view('front.image')->with('quotes',$quotes)->render();

                return view('front.search')
                    ->with('search',false)
                    ->with('searchNotFound',true)
                    ->with('keyword',$request->q)
                    ->with('headCategories',$headCategories)
                    ->with('footerCategories',$footerCategories)
                    ->with('setting',$setting)
                    ->with('popularTags',$popularTags)
                    ->with('trendTags',$trendTags)
                    ->with('trendImageCount',$trendImageCount)
                    ->with('trendImageQuotes',$trendImageQuotes)
                    ->with('popularAuthors',$popularAuthors);

            }
        }

    }


}
