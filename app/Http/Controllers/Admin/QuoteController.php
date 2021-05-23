<?php

namespace App\Http\Controllers\Admin;
// use Illuminate\Support\Facades\Auth;
use App\Author;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveQuoteRequest;
use App\Http\Requests\MassDestroyQuoteRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Quote;
use App\Social;
use App\Tag;
use Gate;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    // }

    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotes = Quote::orderBy('id', 'DESC')->skip(0)->take(5)->get();

        return view('admin.pages.quotes.index', compact('quotes'));
    }

// ================================================= For ANGULAR ================================================================================

    public function getQuotes(Request $request)
    {
        $quotes = Quote::orderBy('id', 'DESC')->paginate($request->PageSize);
        return response()->json([
            'status' => 'success',
            'message' => 'Quotes fetched successfully',
            'data' => $quotes
            ], 201);
    }


    public function getQuote_details(Quote $quote)
    {   
         $quote->load('tags');
         return response()->json([
            'status' => 'success',
            'message' => 'quote details',
            'data' => $quote
        ], 201);
    }

// ==============================================================================================================================================



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = Author::where('status',1)->get();
        $tags = Tag::where('status',1)->get()->pluck('title', 'id');
        return view('admin.pages.quotes.create',compact('authors','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /*------------------------------ Adding Quotes ----------------------------------*/

    // public function store(StoreQuoteRequest $request)
    public function store(Request $request)    
    {  
        $validator = Validator::make($request->all(), [
            'author' => 'required|numeric',
            'text' => 'required',
            'url' => 'required|unique:quotes',
            'meta_title' => 'required',
            'picture_meta_title' => 'required',
            'tags' => 'required|array',

       ]);

        if($validator->fails())
        {
            return response()->json(
                [
                "status" => "failed",
                "message" => "Validation error: There was an error while processing data.",
                "errors" => $validator->errors()->toJson(), 
                ],
                400
            );
        }

        $quote = Quote::create($request->all());
        if ($files = $request->file('image')) {

            $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();

             Helper::compress($request->image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->image = $fileName;
        }
        if ($files = $request->file('video_thumb')) {

            $fileName =  "thumb-".time().'.'.$request->video_thumb->getClientOriginalExtension();

            Helper::compress($request->video_thumb->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->video_thumb = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->meta_image = $fileName;
        }
        if ($files = $request->file('gif')) {

            $fileName =  "gif-".time().'.'.$request->gif->getClientOriginalExtension();

            //Helper::compress($request->gif->getRealPath(), storage_path('app/public/image/'). $fileName);
            $request->gif->storeAs('image', $fileName);

            $quote->gif = $fileName;
        }
        $quote->custom_id='QID'.$quote->id;

        $tags=$request->tags_hidden;
        if($tags[0]!=null){
            $tags=explode(",",$tags[0]);
            foreach($tags as $tag_id){
                DB::table('quote_tag')->insert(
                    array(
                           'quote_id'  =>  $quote->id,
                           'tag_id'  =>   $tag_id,
                    )
                );
            }
        }
        $quote->save();

        Social::create(['quote_id'=>$quote->id]);

        // return redirect()->route('admin.quotes.index');
        return response()->json([
            'status' => 'success',
            'message' => 'create quotes successfully',
            'q_id' => $quote->id
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /*----------------------Viewing Single Quote details -----------------------------*/




    public function show(Quote $quote)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quote->load('tags');
        // return view('admin.pages.quotes.show', compact('quote'));
        // print_r($quote);
        //return json_encode($quote);
          return response()->json([
            'status' => 'success',
            'message' => 'quote details',
            'user' => $quote
        ], 201);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Quote $quote)
    {
        //abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = Author::where('status',1)->get();
        // tags
        $quoteTags=DB::table('quote_tag')->where('quote_id',$quote->id)->get()->toArray();
        
        if(!empty($quoteTags)){
            $tag_ids = array_column($quoteTags, 'tag_id');
            $qTags=Tag::where('status',1)->whereIn('id',$tag_ids)->orderByRaw("field(id,".implode(',',$tag_ids).")")->get();
            $tags = Tag::where('status',1)->whereNotIn('id',$tag_ids)->get();
        }
        else{
            $qTags=[];
            $tags = Tag::where('status',1)->get();
        }
        $quote->load('backendTags');

        return view('admin.pages.quotes.edit', compact('authors','tags','quote','qTags'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //public function update(UpdateQuoteRequest $request, Quote $quote)
    public function update(Request $request, Quote $quote)
    {
        // echo $quote->id; echo "<br>";
        // echo $request->updatedBy; echo "<br>";
        // echo $request->author; echo "<br>";
        // echo $request->text; echo "<br>";
        // echo $request->url; echo "<br>";
        // exit;

        $quote->update($request->all());
        if ($files = $request->file('image')) {

            //code for remove old file
            if($quote->image != ''  && $quote->image != null){
                unlink(storage_path('app/public/image/'.$quote->image));
            }

            $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();

            Helper::compress($request->image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->image = $fileName;
        }
        if ($files = $request->file('gif')) {

            //code for remove old file
            if($quote->gif != ''  && $quote->gif != null){
                unlink(storage_path('app/public/image/'.$quote->gif));
            }

            $fileName =  "gif-".time().'.'.$request->gif->getClientOriginalExtension();

            //Helper::compress($request->gif->getRealPath(), storage_path('app/public/image/'). $fileName);
            $request->gif->storeAs('image', $fileName);

            $quote->gif = $fileName;
        }
        if ($files = $request->file('video_thumb')) {

            //code for remove old file
            if($quote->video_thumb != ''  && $quote->video_thumb != null){
                unlink(storage_path('app/public/image/'.$quote->video_thumb));
            }

            $fileName =  "thumb-".time().'.'.$request->video_thumb->getClientOriginalExtension();

            Helper::compress($request->video_thumb->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->video_thumb = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            //code for remove old file
            if($quote->meta_image != ''  && $quote->meta_image != null){
                unlink(storage_path('app/public/image/'.$quote->meta_image));
            }

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $quote->meta_image = $fileName;
        }

        if($request->input('has_upload')==''){
            if($quote->image != ''  && $quote->image != null){
                unlink(storage_path('app/public/image/'.$quote->image));
            }
            $quote->image = null;
        }
        if($request->input('has_gif')==''){
            if($quote->gif != ''  && $quote->gif != null){
                unlink(storage_path('app/public/image/'.$quote->gif));
            }
            $quote->gif = null;
        }
        if($request->input('has_thumb')==''){
            if($quote->video_thumb != ''  && $quote->video_thumb != null){
                unlink(storage_path('app/public/image/'.$quote->video_thumb));
            }
            $quote->video_thumb = null;
        }
        if($request->input('has_meta')==''){
            if($quote->meta_image != ''  && $quote->meta_image != null){
                unlink(storage_path('app/public/image/'.$quote->meta_image));
            }
            $quote->meta_image = null;
        }
        $tags=$request->tags_hidden;
        if($tags[0]!=null){
            
            $tags=explode(",",$tags[0]);
            DB::table('quote_tag')->where('quote_id',$quote->id)->delete();
            foreach($tags as $tag_id){
                DB::table('quote_tag')->insert(
                    array(
                           'quote_id'  =>  $quote->id,
                           'tag_id'  =>   $tag_id,
                    )
                );
            }
        }
        $quote->save();

        // return redirect()->route('admin.quotes.index');

        return response()->json([
            'status' => 'success',
            'message' => 'quote updated'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    public function destroy(Quote $quote)
    {
        //abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        //code for remove old file
        if($quote->image != ''  && $quote->image != null){
            unlink(storage_path('app/public/image/'.$quote->image));
        }

        //code for remove old file
        if($quote->gif != ''  && $quote->gif != null){
            unlink(storage_path('app/public/image/'.$quote->gif));
        }

  

        //code for remove old file
        if($quote->video_thumb != ''  && $quote->video_thumb != null){
            unlink(storage_path('app/public/image/'.$quote->video_thumb));
        }


        //code for remove old file
        if($quote->meta_image != ''  && $quote->meta_image != null){
            unlink(storage_path('app/public/image/'.$quote->meta_image));
        }


        DB::table('quote_tag')->where('quote_id',$quote->id)->delete();

        Social::where('quote_id',$quote->id)->delete();
        
        $quote->delete();

        // return back();

        return response()->json([
            'status' => 'success',
            'message' => 'quote deleted'
        ], 201);
    }




    public function massDestroy(MassDestroyQuoteRequest $request)
    {
        $quotes=Quote::whereIn('id', request('ids'))->get();

        foreach($quotes as $quote){
            //code for remove old file
            if($quote->image != ''  && $quote->image != null){
                unlink(storage_path('app/public/image/'.$quote->image));
            }

            //code for remove old file
            if($quote->gif != ''  && $quote->gif != null){
                unlink(storage_path('app/public/image/'.$quote->gif));
            }

            //code for remove old file
            if($quote->video_thumb != ''  && $quote->video_thumb != null){
                unlink(storage_path('app/public/image/'.$quote->video_thumb));
            }

            //code for remove old file
            if($quote->meta_image != ''  && $quote->meta_image != null){
                unlink(storage_path('app/public/image/'.$quote->meta_image));
            }
        }

        DB::table('quote_tag')->whereIn('quote_id',request('ids'))->delete();

        Social::whereIn('quote_id',request('ids'))->delete();

        Quote::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function massActive(MassActiveQuoteRequest $request)
    {
        Quote::whereIn('id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveQuoteRequest $request)
    {
        Quote::whereIn('id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }


 ////////////////////////////////////////////////////////////////////////////
    ///
    public function uploadQuotes(Request $request){

        if ($request->csv_file != null ){
            $file = $request->file('csv_file');

            // dd('111');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");

            // 2MB in Bytes
            $maxFileSize = 2097152;

            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){

                // Check file size
                if($fileSize <= $maxFileSize){

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move( public_path($location),$filename);

                    // Import CSV to Database
                    $filepath = public_path($location."/".$filename);

                    // Reading file
                    $file = fopen($filepath,"r");

                    $importData_arr = array();
                    $i = 0;

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata );

                        // Skip first row (Remove below comment if you want to skip the first row)
                        /*if($i == 0){
                            $i++;
                            continue;
                        }*/
                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata [$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    //dd($importData_arr);
                    // Insert to MySQL database
                    $i = 0;
                    foreach($importData_arr as  $importData){

                        if($i != 0){

                            // For Text Only----------------------------
                            if($importData[0]!=''){
                                $text=$importData[0];
                                $text=utf8_encode($text);
                                $text=trim($text);
                            }else{
                                $text=null;
                            }
                            

                            // For Image only--------------------------
                            if($importData[1]!=''){
                                
                                $path_parts=pathinfo($importData[1]);

                                $extensions= array("jpeg","jpg","png");
                                
                                if(in_array($path_parts['extension'],$extensions)=== true){
                                    $data = file_get_contents($importData[1]);
                                    $path=storage_path()."\app\public\image\image-";
                                    $image_name=time().'-'.rand(0,100000).".".$path_parts['extension'];
                                    $new=$path.$image_name;
                                    $upload=file_put_contents($new, $data);
                                    if($upload) {
                                            $filename='image-'.$image_name;
                                    }else{
                                            $filename=null;
                                    }
                                }else{
                                    $filename=null;
                                }
                            }else{
                                $filename=null;
                            }
                            

                            // For Author only-------------------------------
                            if($importData[2]!=''){
                                $term_author=strtolower($importData[2]);
                                $author=Author::where('name',$term_author)->first();
                                if($author){
                                    $author_id=$author->id;
                                }else{
                                    $author_id=1001;
                                }
                               
                            }else{
                                $author_id=1001;
                            }


                            // For Tags only-------------------------------
                            $tag_ids=0;
                            $tags=array();
                            if($importData[3]!=''){
                                $tagArr=explode(",",$importData[3]);
                                foreach($tagArr as $value){
                                    $term_tag=strtolower($value);
                                    $tag=Tag::where('title',$term_tag)->first();
                                    if($tag){
                                        $tags[]=$tag->id;
                                    }
                                }
                            }else{
                                $tag_ids='';
                            }
                            
                            if($author_id!='' && $tag_ids==0 ){
                                if(($text==null && $filename!=null) || ($text!=null && $filename==null) || ($text!=null && $filename!=null)){
                                    $insertData = array(
                                        "text"=>$text,
                                        'author'=>$author_id,
                                    );

                                    if($importData[5]==''){
                                        $importData[5]=null;
                                    }
                                    if($importData[6]==''){
                                        $importData[6]=null;
                                    }
                                    if($importData[7]==''){
                                        $importData[7]=null;
                                    }
                                    if($importData[8]==''){
                                        $meta_desc=null;
                                    }else{
                                        $meta_desc=$importData[8];
                                        $meta_desc=utf8_encode($meta_desc);
                                        $meta_desc=trim($meta_desc);
                                    }
                                    if($importData[9]==''){
                                        $alt=null;
                                    }else{
                                        $alt=$importData[9];
                                        $alt=utf8_encode($alt);
                                        $alt=trim($alt);
                                    }
                                    if($importData[10]==''){
                                        $importData[10]=null;
                                    }
                                    if($importData[11]==''){
                                        $importData[11]=null;
                                    }
                                   
                            
                                    $url=strtolower(str_replace(' ','-',$importData[4]));
                                    if (Quote::where('url', '=',$url)->exists()) {
                                        
                                    }
                                    else{
                                        $quote = Quote::create($insertData);
                                        $quote->status=1;
                                        $quote->url=$url;
                                        $quote->custom_id='QID'.$quote->id;
                                        $quote->image=$filename;
                                        $quote->meta_title=$importData[5];
                                        $quote->meta_author=$importData[6];
                                        $quote->meta_keywords=$importData[7];
                                        $quote->meta_desc=$meta_desc;
                                        $quote->alt=$alt;
                                        $quote->video_title=$importData[10];
                                        $quote->video_desc=$importData[11];
                                        $quote->createdBy=Auth::guard('admin')->user()->id;
                                        $quote->tags()->sync($tags);
                                        $quote->save();

                                        Social::create(['quote_id'=>$quote->id]);
                                    }

                                }
                            }


                        }
                        $i++;

                    }

                    \Session::flash('message','Import Successful.');
                }else{
                    \Session::flash('error','File too large. File must be less than 2MB.');
                }

            }else{
                \Session::flash('error','Invalid File Extension.');
            }

        }

        // Redirect to index
        return back();
    }
}
