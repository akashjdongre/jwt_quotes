<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveTagRequest;
use App\Http\Requests\MassDestroyTagRequest;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdatePopularTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Requests\UpdateTrendTagRequest;
use App\Tag;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::with('quotes')->orderBy('id', 'DESC')->get();

        return view('admin.pages.tags.index', compact('tags'));
    }

    
    public function getTags(Request $request, $page = 1)
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate($request->PageSize);
        return response()->json([
            'status' => 'success',
            'message' => 'tags fetched successfully',
            'data' => $tags
            ], 201);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        print_r($request->all()); exit;
        $tag = Tag::create($request->all());
        if ($files = $request->file('meta_image')) {

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $tag->meta_image = $fileName;
        }
        $tag->custom_id='TAGID'.$tag->id;
        $tag->save();

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {   
         return response()->json([
            'status' => 'success',
            'message' => 'tag details',
            'data' => $tag
        ], 201);

        //abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //return view('admin.pages.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        if ($files = $request->file('meta_image')) {

            //code for remove old file
            if($tag->meta_image != ''  && $tag->meta_image != null){
                unlink(storage_path('app/public/image/'.$tag->meta_image));
            }

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $tag->meta_image = $fileName;
        }

        if($request->status==2){ // deactive
            $now=now();
            DB::table('trending_tags')->where('tag_id', $tag->id)->update(['deleted_at' =>$now]);
            DB::table('popular_tags')->where('tag_id', $tag->id)->update(['deleted_at' =>$now]);
            DB::table('category_tag')->where('tag_id', $tag->id)->update(['deleted_at' =>$now]);
        }
        if($request->status==1){
            DB::table('trending_tags')->where('tag_id', $tag->id)->update(['deleted_at' =>null]);
            DB::table('popular_tags')->where('tag_id', $tag->id)->update(['deleted_at' =>null]);
            DB::table('category_tag')->where('tag_id', $tag->id)->update(['deleted_at' =>null]);
        }

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        //code for remove old file
        if($tag->meta_image != ''  && $tag->meta_image != null){
            unlink(storage_path('app/public/image/'.$tag->meta_image));
        }
       
        DB::table('category_tag')->where('tag_id',$tag->id)->delete();
        DB::table('quote_tag')->where('tag_id',$tag->id)->delete();
        DB::table('popular_tags')->where('tag_id',$tag->id)->delete();
        DB::table('trending_tags')->where('tag_id',$tag->id)->delete();
        $tag->delete();

        return back();
    }

    public function massDestroy(MassDestroyTagRequest $request)
    {

        $tags=Tag::whereIn('id', request('ids'))->get();

        foreach($tags as $tag){
            //code for remove old file
            if($tag->meta_image != ''  && $tag->meta_image != null){
                unlink(storage_path('app/public/image/'.$tag->meta_image));
            }

        }

       DB::table('category_tag')->whereIn('tag_id',request('ids'))->delete();
       DB::table('quote_tag')->whereIn('tag_id',request('ids'))->delete();
       DB::table('popular_tags')->whereIn('tag_id',request('ids'))->delete();
       DB::table('trending_tags')->whereIn('tag_id',request('ids'))->delete();

        Tag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massActive(MassActiveTagRequest $request)
    {
        Tag::whereIn('id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveTagRequest $request)
    {
        Tag::whereIn('id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function trend()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('trending_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
      
        $trend_id=DB::table('trending_tags')->get();

        if(!$trend_id->isEmpty()){
              ///////////
            $ids = [];
            foreach ($trend_id as $key => $value) {
                $ids[] =  $value->tag_id;
            }
            ///////////
    
            $tags = Tag::where('status',1)->whereNotIn('id',$ids)->get();
    
            $trendTags=Tag::where('status',1)->whereIn('id',$ids)->orderByRaw("field(id,".implode(',',$ids).")")->get();    

        }
        else{
            $tags = Tag::where('status',1)->get();
            $trendTags=[];
        }
        
        /*$trendTagsArr = [];
        foreach ($trendTags as $key => $value) {
            $trendTagsArr[] =  $value->id;
        }*/
        return view('admin.pages.tags.trend', compact('trendTags','tags'));
    }

    public function trendUpdate(UpdateTrendTagRequest $request)
    {
        
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('trending_tag_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$tags=$request->tags;
        $tags=$request->tags_hidden;
        if($tags[0]!=null){

            DB::table('trending_tags')->truncate();
            $tags=explode(",",$tags[0]);


            $data=[];
            foreach($tags as $tag){
            $data[]= array('tag_id' => $tag);
            }

            DB::table('trending_tags')->insert($data);
        }
        

        

        return redirect()->route('admin.tags.trend')->with('message','Trending Tags Added Successfully');
    }


    public function popular()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('popular_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      
        ///////////
        $popular_id=DB::table('popular_tags')->get();
       
        if(!$popular_id->isEmpty()){
            $ids = [];
            foreach ($popular_id as $key => $value) {
                $ids[] =  $value->tag_id;
            }


            $tags = Tag::where('status',1)->whereNotIn('id',$ids)->get();

            $popularTags=Tag::where('status',1)->whereIn('id',$ids)->orderByRaw("field(id,".implode(',',$ids).")")->get();
        }
        else{
            $tags = Tag::where('status',1)->get();
            $popularTags=[];
        }
        ///////////

    
        return view('admin.pages.tags.popular', compact('popularTags','tags'));
    }

    public function popularUpdate(UpdatePopularTagRequest $request)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('popular_tag_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
        $tags=$request->tags_hidden;
        if($tags[0]!=null){
            DB::table('popular_tags')->truncate();
            $tags=explode(",",$tags[0]);

            $data=[];
            foreach($tags as $tag){
                $data[]= array('tag_id' => $tag);
            }

            DB::table('popular_tags')->insert($data);

        }

        return redirect()->route('admin.tags.popular')->with('message','Popular Tags Added Successfully');
    }



    public function uploadTags(Request $request){

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
                            if($importData[0]!=''){
                                $title=strtoupper($importData[0]);
                                if($importData[1]==''){
                                    $importData[1]=null;
                                }
                                if($importData[2]==''){
                                    $importData[2]=null;
                                }
                                if($importData[3]==''){
                                    $importData[3]=null;
                                }
                                if($importData[4]==''){
                                    $importData[4]=null;
                                }

                                $url=strtolower(str_replace(" ","-",$importData[0]));

                                $tag = Tag::where('title',$title)->first();
                                if($tag){
                                    $tag->deleted_at = null;
                                    $updateData = array(
                                        "title"=>$title,
                                        "meta_title"=>$importData[1],
                                        "meta_author"=>$importData[2],
                                        "meta_keywords"=>$importData[3],
                                        "meta_desc"=>$importData[4],
                                        "url"=>$url
                                    );
                                    $tag->update($updateData);
                                    $tag->status = 1;
                                    $tag->updatedBy=Auth::guard('admin')->user()->id;
                                    $tag->save();
                                }else{
                                    $tag = Tag::where('title',$title)->first();
                                    if(!isset($tag->id)){
                                        $insertData = array(
                                            "title"=>$title,
                                            "meta_title"=>$importData[1],
                                            "meta_author"=>$importData[2],
                                            "meta_keywords"=>$importData[3],
                                            "meta_desc"=>$importData[4],
                                            "url"=>$url
                                        );
                                        $tag = Tag::create($insertData);
                                        $tag->status = 1;
                                        $tag->custom_id='TAGID'.$tag->id;
                                        $tag->createdBy=Auth::guard('admin')->user()->id;
                                        $tag->save();
                                    }
                                    else{
                                        $updateData = array(
                                            "title"=>$title,
                                            "meta_title"=>$importData[1],
                                            "meta_author"=>$importData[2],
                                            "meta_keywords"=>$importData[3],
                                            "meta_desc"=>$importData[4],
                                            "url"=>$url
                                        );
                                        $tag->update($updateData);
                                        $tag->status = 1;
                                        $tag->updatedBy=Auth::guard('admin')->user()->id;
                                        $tag->save();
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
