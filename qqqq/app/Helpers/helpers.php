<?php
//app/Helpers/helpers.php
namespace App\Helpers;


use App\Author;
use App\Blog;
use App\Category;
use App\Quote;
use App\Setting;
use App\Social;
use App\Tag;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class Helper {


    public static function fetchDataByModelAndCol($model,$col,$value){

        $data = $model::where($col,$value)->first();

        return $data;
    }


    public static function quoteByUrl($url){

        $quote = Quote::with('tags')->with('socials')->where('url',$url)->first();

        return $quote;
    }


    public static function blogByUrl($url){

        $quote = Blog::where('url',$url)->first();

        return $quote;
    }



    public static function settings(){

        $setting=Setting::where('id',1)->first();

        return $setting;
    }



    /**
     * Fetch Header Categories
     *
     * @return mixed
     */
    public static function headerCategories($limit=''){

        // fetch head categories
        $headCategories = Category::where('location',1)->where('status',1);

        if($limit!=''){
            $headCategories=$headCategories->limit($limit);
        }
        $headCategories=$headCategories->get();

        return $headCategories;
    }

    /**
     * Fetch Footer Categories
     *
     * @return mixed
     */
    public static function footerCategories($limit=''){

        // fetch footer categories
        $footerCategories = Category::where('location',2)->where('status',1);

        if($limit!=''){
            $footerCategories=$footerCategories->limit($limit);
        }
        $footerCategories=$footerCategories->get();

        return $footerCategories;
    }



    
    /**
     * Fetch sub Categories
     *
     * @return mixed
     */
    public static function subCategories($cat_id,$limit=''){

        $sub_cats=DB::table('sub_cats')->where('parent_id',$cat_id)->get()->toArray();
        $sub_cat_ids = array_column($sub_cats, 'sub_cat_id');

        // fetch head categories
        $subCategories = Category::whereIn('id',$sub_cat_ids)->where('status',1);

        if($limit!=''){
            $subCategories=$subCategories->limit($limit);
        }
        $subCategories=$subCategories->get();

        return $subCategories;
    }


    /**
     * Fetch Single Tag
     *
     * @return mixed
     */
    public static function singleTag($col,$value){

        //$value = strtoupper(str_replace('-',' ',$value));
        // fetch single tag
        $tag = Tag::with('quotes')->where($col,$value)->where('status',1)->first();

        if($tag){
            return $tag;
        }else{
            return abort(404,'No page found regarding this url');
        }

    }



    /**
     * Fetch Single Tag
     *
     * @return mixed
     */
    public static function singleCategory($col,$value){

//        $value = strtoupper(str_replace('-',' ',$value));
        // fetch single tag
        $category = Category::with('tags')->where($col,$value)->where('status',1)->first();

        if($category){
            return $category;
        }else{
            return abort(404,'No page found regarding this url');
        }

    }


    /**
     * Fetch Single Author
     *
     * @return mixed
     */
    public static function singleAuthor($col,$value){

       // $value = strtoupper(str_replace('-',' ',$value));
        // fetch single tag
        $author = Author::with('quotes')->where($col,$value)->where('status',1)->first();

        if($author){
            return $author;
        }else{
            return abort(404,'No page found regarding this url');
        }

    }

    /**
     * Fetch Related Tags
     *
     * @return mixed
     */
    public static function RelatedTags($limit='',$col,$value){

        $tag=Helper::singleTag($col,$value);

        if(isset($tag->quotes) && !empty($tag->quotes)){
            // convert to an array
            $ids = [];
            foreach ($tag->quotes as $quote) {
                $ids[] =  $quote->id;
            }

            $tag_ids = DB::table('quote_tag')->select('tag_id')->whereIn('quote_id',$ids)->distinct()->get();

            // convert to an array
            $Tagids = [];
            foreach ($tag_ids as $key => $value) {
                $Tagids[] =  $value->tag_id;
            }

            $relatedTags = Tag::with('quotes')->whereIn('id',$Tagids)
                ->where('status',1);

            if($limit!=''){
                $relatedTags=$relatedTags->limit($limit);
            }

            $relatedTags=$relatedTags->get();
        }

        return $relatedTags;
    }


    /**
     * Fetch Related Tags
     *
     * @return mixed
     */
    public static function RelatedTagsByCategory($limit='',$col,$value){

        $cat=Helper::singleCategory($col,$value);

        if(isset($cat->tags) && !empty($cat->tags)){


            $ids = array_column($cat->tags->toArray(), 'id');


            $relatedTags = Tag::with('quotes')->whereIn('id',$ids)
                ->where('status',1);

            if($limit!=''){
                $relatedTags=$relatedTags->limit($limit);
            }

            $relatedTags=$relatedTags->get();
        }

        return $relatedTags;
    }



    /**
     * Fetch Related Tags
     *
     * @return mixed
     */
    public static function otherAuthors($col,$value,$limit=''){

        $author=Helper::singleAuthor($col,$value);

        $otherAuthors=Author::with('quotes')->where('status',1)->where('id','!=',$author->id);

        if($limit!=''){
            $otherAuthors=$otherAuthors->limit($limit);
        }

        $otherAuthors=$otherAuthors->get();

        return $otherAuthors;
    }



    /**
     * Fetch Quotes by tag
     *
     * @return mixed
     */
    public static function quotesByTag($col,$value,$type='',$orderBy='',$order='',$limit='',$skip='',$take=''){

        $tag =Helper::singleTag($col,$value);

        if(isset($tag->quotes) && !empty($tag->quotes)){
            // convert to an array
            $ids = [];
            foreach ($tag->quotes as $quote) {
                $ids[] =  $quote->id;
            }

            $quotes= Quote::with('tags')->with('socials')->whereIn('id',$ids)
                ->where('status',1)->where('is_approved',1);

            if($type!=''){
                $quotes=$quotes->where($type,'!=','');
            }

            if($orderBy!=''){

                if($order!='')
                {
                    $quotes=$quotes->orderBy($orderBy,$order);
                }
                else
                {
                    $quotes=$quotes->orderBy($orderBy,'ASC');
                }
            }

            if($skip!=''){
                $quotes=$quotes->skip($skip);
            }

            if($take!=''){
                $quotes=$quotes->take($take);
            }

            if($limit!=''){
                $quotes=$quotes->limit($limit);
            }

            $quotes=$quotes->get();

        }else{
            $quotes=array();
        }

        return $quotes;

    }


    /**
     * Fetch Quotes by tags
     *
     * @return mixed
     */
    public static function relatedCategories($tags,$type='',$orderBy='',$order='',$limit='',$skip='',$take=''){


        if(isset($tags) && !empty($tags)){

            $ids = array_column($tags->toArray(), 'id');

            $cats_ids=DB::table('category_tag')->select('category_id')->whereIn('tag_id',$ids)->distinct()->get()->toArray();
            $cat_ids = array_column($cats_ids, 'category_id');

            $cats = Category::where('status',1)->whereIn('id',$cat_ids);

            if($orderBy!=''){

                if($order!='')
                {
                    $cats=$cats->orderBy($orderBy,$order);
                }
                else
                {
                    $cats=$cats->orderBy($orderBy,'ASC');
                }
            }

            if($skip!=''){
                $cats=$cats->skip($skip);
            }

            if($take!=''){
                $cats=$cats->take($take);
            }

            if($limit!=''){
                $cats=$cats->limit($limit);
            }

            $cats=$cats->get();

        }else{
            $cats=array();
        }

        return $cats;

    }


    /**
     * Fetch Quotes by tags
     *
     * @return mixed
     */
    public static function relatedQuotes($tags,$type='',$orderBy='',$order='',$limit='',$skip='',$take='',$notInId=''){


            if(isset($tags) && !empty($tags)){

            $ids = array_column($tags->toArray(), 'id');

            $quotes_ids=DB::table('quote_tag')->select('quote_id')->whereIn('tag_id',$ids)->distinct()->get()->toArray();
            $quote_ids = array_column($quotes_ids, 'quote_id');

            $quotes= Quote::with('tags')->with('socials')->whereIn('id',$quote_ids);

            if($notInId!=''){

                $quotes= $quotes->where('id','!=',$notInId);
            }
            $quotes= $quotes->where('status',1)->where('is_approved',1);

            if($type!=''){
                $quotes=$quotes->where($type,'!=',null);
                $quotes=$quotes->where($type,'!=','');
            }

            if($orderBy!=''){

                if($order!='')
                {
                    $quotes=$quotes->orderBy($orderBy,$order);
                }
                else
                {
                    $quotes=$quotes->orderBy($orderBy,'ASC');
                }
            }

            if($skip!=''){
                $quotes=$quotes->skip($skip);
            }

            if($take!=''){
                $quotes=$quotes->take($take);
            }

            if($limit!=''){
                $quotes=$quotes->limit($limit);
            }

            $quotes=$quotes->get();

        }else{
            $quotes=array();
        }

        return $quotes;

    }


    /**
     * Fetch Authors by tags
     *
     * @return mixed
     */
    public static function relatedAuthors($tags,$type='',$orderBy='',$order='',$limit='',$skip='',$take=''){


        if(isset($tags) && !empty($tags)){

            $ids = array_column($tags->toArray(), 'id');

            $quotes_ids=DB::table('quote_tag')->select('quote_id')->whereIn('tag_id',$ids)->distinct()->get()->toArray();
            $quote_ids = array_column($quotes_ids, 'quote_id');

            $author_ids= Quote::select('author')->whereIn('id',$quote_ids)->where('status',1)->where('is_approved',1)->get()->toArray();
            $author_ids = array_column($author_ids, 'author');

            $author=Author::with('quotes')->where('status',1)->whereIn('id',$author_ids);

            if($orderBy!=''){

                if($order!='')
                {
                    $author=$author->orderBy($orderBy,$order);
                }
                else
                {
                    $author=$author->orderBy($orderBy,'ASC');
                }
            }

            if($skip!=''){
                $author=$author->skip($skip);
            }

            if($take!=''){
                $author=$author->take($take);
            }

            if($limit!=''){
                $author=$author->limit($limit);
            }

            $author=$author->get();


        }else{
            $author=array();
        }

        return $author;

    }

    /**
     * Fetch Quotes by Category
     *
     * @return mixed
     */
    public static function quotesByCategory($col,$value,$type='',$orderBy='',$order='',$limit='',$skip='',$take=''){

        $cat =Helper::singleCategory($col,$value);

        if(isset($cat->tags) && !empty($cat->tags)){

            $ids = array_column($cat->tags->toArray(), 'id');

            $quotes_ids=DB::table('quote_tag')->select('quote_id')->whereIn('tag_id',$ids)->distinct()->get()->toArray();
            $quote_ids = array_column($quotes_ids, 'quote_id');

            $quotes= Quote::with('tags')->with('socials')->whereIn('id',$quote_ids)
                ->where('status',1)->where('is_approved',1);

            if($type!=''){
                $quotes=$quotes->where($type,'!=','');
            }

            if($orderBy!=''){

                if($order!='')
                {
                    $quotes=$quotes->orderBy($orderBy,$order);
                }
                else
                {
                    $quotes=$quotes->orderBy($orderBy,'ASC');
                }
            }

            if($skip!=''){
                $quotes=$quotes->skip($skip);
            }

            if($take!=''){
                $quotes=$quotes->take($take);
            }

            if($limit!=''){
                $quotes=$quotes->limit($limit);
            }

            $quotes=$quotes->get();

        }else{
            $quotes=array();
        }

        return $quotes;

    }


    /**
     * Fetch Quotes by author
     *
     * @return mixed
     */
    public static function quotesByAuthor($col,$value,$type='',$orderBy='',$order='',$limit='',$skip='',$take=''){

        $author =Helper::singleAuthor($col,$value);

        $quotes =  Quote::with('tags')->with('socials')->where('author',$author->id)->where('status', 1)->where('is_approved',1);

        if($type!=''){
            $quotes=$quotes->where($type,'!=','');
        }

        if($orderBy!=''){

            if($order!='')
            {
                $quotes=$quotes->orderBy($orderBy,$order);
            }
            else
            {
                $quotes=$quotes->orderBy($orderBy,'ASC');
            }
        }

        if($skip!=''){
            $quotes=$quotes->skip($skip);
        }

        if($take!=''){
            $quotes=$quotes->take($take);
        }

        if($limit!=''){
            $quotes=$quotes->limit($limit);
        }

        $quotes=$quotes->get();

        return $quotes;

    }


    /**
     * Fetch Trending Tags
     *
     * @return mixed
     */
    public static function trendingTags($limit=''){

        // fetch trending tags ids
        $trend_id = DB::table('trending_tags')->select('tag_id')->get()->toArray();

        if(!empty($trend_id)){
            $ids = array_column($trend_id, 'tag_id');

            $count=count($ids);
            
            // fetch trending tags from all tags
            $trendTags=DB::table('quote_tag')
            ->leftJoin('socials', 'quote_tag.quote_id', '=', 'socials.quote_id')
            ->orderby('socials.total_share','desc')->get()->toArray();
            $quote_ids = array_column($trendTags, 'quote_id');
            $tags_id=DB::table('quote_tag')->select('tag_id')->whereIn('quote_id',$quote_ids)->orderByRaw("field(quote_id,".implode(',',$quote_ids).")")->get()->toArray();
            
            $trendTagsIds = array_column($tags_id, 'tag_id');
            
            $trendIds=array_merge($ids,$trendTagsIds);
            
            $unique_tags = array_unique($trendIds);
            

            $trendTagItems=Tag::where('status',1)->whereIn('id',$unique_tags)
            ->orderByRaw("field(id,".implode(',',$unique_tags).")");

            if($limit!='')
            {
                $trendTagItems=$trendTagItems->limit($limit);
            }

            $trendTagItems=$trendTagItems->get();
            
            return $trendTagItems;
        }
    }


    /**
     * Fetch Popular Tags
     *
     * @return mixed
     */
    public static function popularTags($limit='',$orderby='',$order=''){

        //fetch popular tags ids
        $popular_id=DB::table('popular_tags');

        if($limit!=''){
            $popular_id= $popular_id->limit($limit);
        }

        $popular_id=$popular_id->get();

        if(!$popular_id->isEmpty()) {
            // convert to an array
            $ids = [];
            foreach ($popular_id as $key => $value) {
                $ids[] = $value->tag_id;
            }

            // fetch popular tags from all tags
            $popularTags = Tag::with('quotes')->where('status', 1)->whereIn('id', $ids);
            if($orderby!=''){
                $popularTags=$popularTags->orderby($orderby,$order);
            }else{
                $popularTags=$popularTags->orderByRaw("field(id,".implode(',',$ids).")");
            }
            $popularTags=$popularTags->get();
        }
        else{
            $popularTags=array();
        }

        return $popularTags;
    }


    /**
     * Fetch Popular Tags
     *
     * @return mixed
     */
    public static function topCategories($limit='',$orderby='',$order=''){

        //fetch top categories ids
        $topCat_id=DB::table('top_cats')->select('cat_id');

        if($limit!=''){
            $topCat_id= $topCat_id->limit($limit);
        }

        $topCat_id=$topCat_id->get()->toArray();
        if(isset($topCat_id) && !empty($topCat_id)) {

            $ids = array_column($topCat_id, 'cat_id');

            // fetch popular tags from all tags
            $topCats = Category::with('tags')->where('status', 1)->whereIn('id', $ids);
            if($orderby!=''){
                $topCats=$topCats->orderby($orderby,$order);
            }else{
                $topCats=$topCats->orderByRaw("field(id,".implode(',',$ids).")");
            }
            $topCats=$topCats->get();
        }else{
            $topCats = collect(new Category);
        }

        return $topCats;
    }


    /**
     * Fetch Quotes
     *
     * @return mixed
     */
    public static function fetchQuotes($limit='',$type='',$order='',$skip='',$take=''){

        //fetch popular tags ids
        $quotes = new Quote;

        if($type!=''){
            $quotes=  $quotes->where($type,'!=',NULL);
            $quotes=  $quotes->where($type,'!=','');
        }

        if($order!=''){
            $quotes=$quotes->orderBy('created_at',$order);
        }

        if($skip!=''){
            $quotes=$quotes->skip($skip);
        }

        if($take!=''){
            $quotes=$quotes->take($take);
        }

        if($limit!=''){
            $quotes=$quotes->limit($limit);
        }

        $quotes=$quotes->with('tags')->with('socials')->where('status', 1)->where('is_approved', 1)->get();

        return $quotes;
    }



    /**
     * Fetch Quotes
     *
     * @return mixed
     */
    public static function fetchBlogs($limit='',$order='',$skip='',$take='',$col='',$val=''){

        //fetch popular tags ids
        $blogs = new Blog;

        if($col !='' & $val !=''){
            $blogs=$blogs->where($col,$val);
        }

        if($order!=''){
            $blogs=$blogs->orderBy('created_at',$order);
        }

        if($skip!=''){
            $blogs=$blogs->skip($skip);
        }

        if($take!=''){
            $blogs=$blogs->take($take);
        }

        if($limit!=''){
            $blogs=$blogs->limit($limit);
        }

        $blogs=$blogs->where('status', 1)->get();

        return $blogs;
    }


    /**
     * Fetch Quotes
     *
     * @return mixed
     */
    public static function fetchQuotesAsTags($limit='',$type='',$order='',$skip='',$take=''){

        $tagIdsArr=Tag::select('id')->where('status',1)->orderBy('title','asc')->get()->toArray();

        $tagIds=array_column($tagIdsArr,'id');

        $quotesIdsArr=DB::table('quote_tag')->select('quote_id')->whereIn('tag_id',$tagIds)
            ->orderByRaw("field(tag_id,".implode(',',$tagIds).")")->distinct()->get()->toArray();

        $quoteIds=array_column($quotesIdsArr,'quote_id');

        $quotes=Quote::with('tags')->with('socials')->where('status', 1)->where('is_approved', 1)
            ->whereIn('id',$quoteIds);

        if($type!=''){
            $quotes=  $quotes->where($type,'!=',null);
            $quotes=  $quotes->where($type,'!=','');
        }

        if($order!=''){
            $quotes=$quotes->orderBy('created_at',$order);
        }

        if($skip!=''){
            $quotes=$quotes->skip($skip);
        }

        if($take!=''){
            $quotes=$quotes->take($take);
        }

        if($limit!=''){
            $quotes=$quotes->limit($limit);
        }

        $quotes=$quotes->orderByRaw("field(id,".implode(',',$quoteIds).")")->get();

        return $quotes;
    }


    /**
     * Fetch Quotes
     *
     * @return mixed
     */
    public static function fetchTrendingQuotes($limit='',$type='',$order='',$skip='',$take=''){


        $trendQuotes =  Quote::with('tags')->with('socials')->where('status', 1)->where('is_approved',1);
        if($type=='text'){
            $trendQuotes=$trendQuotes->where('text','!=','');
        }
        if($type=='image'){
            $trendQuotes=$trendQuotes->where('image','!=','');
        }
        $trendQuotes=$trendQuotes->leftJoin('socials', 'quotes.id', '=', 'socials.quote_id')->orderby('socials.total_share','desc')
            ->select('quotes.*');

        if($skip!=''){
            $trendQuotes=$trendQuotes->skip($skip);
        }

        if($take!=''){
            $trendQuotes=$trendQuotes->take($take);
        }

        if($limit!=''){
            $trendQuotes=$trendQuotes->limit($limit);
        }

        $trendQuotes=$trendQuotes->get();

        return $trendQuotes;

    }



    /**
     * Fetch Popular Authors
     *
     * @return mixed
     */
    public static function popularAuthors($limit='',$orderby='',$order=''){

        //fetch popular popular ids
        $popular_id=DB::table('popular_authors');

        if($limit!=''){
            $popular_id= $popular_id->limit($limit);
        }

        $popular_id=$popular_id->get();
        

        if(!$popular_id->isEmpty()) {
            // convert to an array
            $ids = [];
            foreach ($popular_id as $key => $value) {
                $ids[] = $value->author_id;
            }

            // fetch popular tags from all tags
            $popularAuthors = Author::with('quotes')->where('status', 1)
            ->whereIn('id', $ids);
            if($orderby!=''){
                $popularAuthors=$popularAuthors->orderby($orderby,$order);
            }else{
                $popularAuthors=$popularAuthors->orderByRaw("field(id,".implode(',',$ids).")");
            }

            $popularAuthors=$popularAuthors->get();

        }
        else{
            $popularAuthors=array();
        }

        return $popularAuthors;
    }


    /**
     * Fetch Popular Authors
     *
     * @return mixed
     */
    public static function allAuthors($limit='',$orderby='',$order=''){

        //fetch authors
        $authors=Author::with('quotes')->where('status',1);

        if($orderby!=''){
            $authors=$authors->orderby($orderby,$order);
        }
            $authors=$authors->get();

        return $authors;
    }


    /**
     * Fetch All Categories
     *
     * @return mixed
     */
    public static function allCategory($limit='',$orderby='',$order=''){

        //fetch categories
        $category=Category::with('tags')->where('status',1);

        if($orderby!=''){
            $category=$category->orderby($orderby,$order);
        }
        $category=$category->get();

        return $category;
    }

    /**
     * Fetch All Tags
     *
     * @return mixed
     */
    public static function allTags($limit='',$orderby='',$order=''){

        //fetch categories
        $tag=Tag::with('quotes')->where('status',1)->where('visibility',1);

        if($orderby!=''){
            $tag=$tag->orderby($orderby,$order);
        }
        $tag=$tag->get();

        return $tag;
    }


//    function number_shorten($number, $precision = 3, $divisors = null) {
//
//        // Setup default $divisors if not provided
//        if (!isset($divisors)) {
//            $divisors = array(
//                pow(1000, 0) => '', // 1000^0 == 1
//                pow(1000, 1) => 'K', // Thousand
//                pow(1000, 2) => 'M', // Million
//                pow(1000, 3) => 'B', // Billion
//                pow(1000, 4) => 'T', // Trillion
//                pow(1000, 5) => 'Qa', // Quadrillion
//                pow(1000, 6) => 'Qi', // Quintillion
//            );
//        }
//
//        // Loop through each $divisor and find the
//        // lowest amount that matches
//        foreach ($divisors as $divisor => $shorthand) {
//            if (abs($number) < ($divisor * 1000)) {
//                // We found a match!
//                break;
//            }
//        }
//
//        // We found our match, or there were no matches.
//        // Either way, use the last defined value for $divisor.
//        return number_format($number / $divisor, $precision) . $shorthand;
//    }


    public static function number_format_short( $n, $precision = 1 ) {
        if ($n < 900) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 900000) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }

        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }

        return $n_format . $suffix;
    }



    /**
     * @param $n
     * @return string
     * Use to convert large positive numbers in to short form like 1K+, 100K+, 199K+, 1M+, 10M+, 1B+ etc
     */
    function number_format_short1( $n ) {
        if ($n > 0 && $n < 1000) {
            // 1 - 999
            $n_format = floor($n);
            $suffix = '';
        } else if ($n >= 1000 && $n < 1000000) {
            // 1k-999k
            $n_format = floor($n / 1000);
            $suffix = 'K+';
        } else if ($n >= 1000000 && $n < 1000000000) {
            // 1m-999m
            $n_format = floor($n / 1000000);
            $suffix = 'M+';
        } else if ($n >= 1000000000 && $n < 1000000000000) {
            // 1b-999b
            $n_format = floor($n / 1000000000);
            $suffix = 'B+';
        } else if ($n >= 1000000000000) {
            // 1t+
            $n_format = floor($n / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    }


    public static function compress($source, $destination) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg'){
            $image = imagecreatefromjpeg($source);
            imagejpeg($image, $destination, 50);
        }
        elseif ($info['mime'] == 'image/gif'){
            // Create a new true color image
//            $image=imagecreatefromstring($source);
//            imagetruecolortopalette($image, false, 16);
//            imagegif($image, $destination);
        }
        elseif ($info['mime'] == 'image/png'){
            $image = imagecreatefrompng($source);
            imagejpeg($image, $destination, 50);
            //imagepng($image, $destination, 9);
        }

        return $destination;
    }


}
