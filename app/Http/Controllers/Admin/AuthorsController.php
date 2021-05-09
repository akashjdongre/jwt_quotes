<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Quote;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveAuthorRequest;
use App\Http\Requests\MassDestroyAuthorRequest;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Requests\UpdatePopularAuthorRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('author_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = Author::with('quotes')->orderBy('id', 'DESC')->get();

        return view('admin.pages.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('author_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->all());
        if ($files = $request->file('image')) {

            $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();
             Helper::compress($request->image->getRealPath(), storage_path('app/public/authors/'). $fileName);

            $author->image = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();
            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/authors/'). $fileName);

            $author->meta_image = $fileName;
        }
        $author->custom_id='AUID'.$author->id;
        $author->save();

        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('author_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.pages.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('author_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request,Author $author)
    {
        $author->update($request->all());
        if ($files = $request->file('image')) {

            //code for remove old file
            if($author->image != ''  && $author->image != null){
                //dd(storage_path('app/public/authors/'.$author->image)); die;
                unlink(storage_path('app/public/authors/'.$author->image));
            }

            $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();
            Helper::compress($request->image->getRealPath(), storage_path('app/public/authors/'). $fileName);

            $author->image = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            //code for remove old file
            if($author->meta_image != ''  && $author->meta_image != null){
                unlink(storage_path('app/public/authors/'.$author->meta_image));
            }

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();
            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/authors/'). $fileName);

            $author->meta_image = $fileName;
        }
        $author->save();

        return redirect()->route('admin.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('author_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($author->id!=1001){ // for anonymous

                //code for remove old file
                if($author->image != ''  && $author->image != null){
                    unlink(storage_path('app/public/authors/'.$author->image));
                }

                //code for remove old file
                if($author->meta_image != ''  && $author->meta_image != null){
                    unlink(storage_path('app/public/authors/'.$author->meta_image));
                }

            Quote::where('author',$author->id)->update(['author'=>1001]);

            DB::table('popular_authors')->where('author_id',$author->id)->delete();

            $author->delete();
        }

        return back();
    }

    public function massDestroy(MassDestroyAuthorRequest $request)
    {
        $authors=Author::whereIn('id', request('ids'))->get();

        foreach($authors as $author){
            //code for remove old file
            if($author->image != ''  && $author->image != null){
                unlink(storage_path('app/public/authors/'.$author->image));
            }

            //code for remove old file
            if($author->meta_image != ''  && $author->meta_image != null){
                unlink(storage_path('app/public/authors/'.$author->meta_image));
            }

        }

        
        Quote::whereIn('author',request('ids'))->update(['author'=>1001]);

        DB::table('popular_authors')->whereIn('author_id',request('ids'))->delete();

        Author::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massActive(MassActiveAuthorRequest $request)
    {
        Author::whereIn('id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveAuthorRequest $request)
    {
        Author::whereIn('id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function popular()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('popular_author_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $popular_id=DB::table('popular_authors')->get();

        if(!$popular_id->isEmpty()){
            $ids = [];
            foreach ($popular_id as $key => $value) {
                $ids[] =  $value->author_id;
            }

            $authors = Author::where('status',1)->whereNotIn('id',$ids)->get();

            $popularAuthors=Author::where('status',1)->whereIn('id',$ids)->orderByRaw("field(id,".implode(',',$ids).")")->get();

        }
        else{
            $authors = Author::where('status',1)->get();
            $popularAuthors=[];
        }

        
        return view('admin.pages.authors.popular', compact('popularAuthors','authors'));
    }

    public function popularUpdate(UpdatePopularAuthorRequest $request)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('popular_author_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        

        $authors=$request->authors_hidden;
        if($authors[0]!=null){
            DB::table('popular_authors')->truncate();
            $authors=explode(",",$authors[0]);

            $data=[];
            foreach($authors as $author){
                $data[]= array('author_id' => $author);
            }

            DB::table('popular_authors')->insert($data);

        }

        

        return redirect()->route('admin.authors.popular')->with('message','Popular Authors Added Successfully');
    }


    public function uploadAuthors(Request $request){

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
                            if($importData[0]!='' && $importData[1]!=''){
                                $name=strtoupper($importData[0]);
                                if($importData[2]==''){
                                    $importData[2]=null;
                                }
                                if($importData[3]==''){
                                    $importData[3]=null;
                                }
                                if($importData[4]==''){
                                    $importData[4]=null;
                                }
                                if($importData[5]==''){
                                    $meta_desc=null;
                                }else{
                                    $meta_desc=$importData[5];
                                        $meta_desc=utf8_encode($meta_desc);
                                        $meta_desc=trim($meta_desc);
                                }
                                if($importData[6]==''){
                                    $about=null;
                                }else{
                                    $about=$importData[6];
                                        $about=utf8_encode($about);
                                        $about=trim($about);
                                }
                                
                                $url=strtolower(str_replace(" ","-",$importData[1]));
                                

                                $author = Author::where('name',$name)->first();
                                if($author){
                                    $author->deleted_at = null;
                                    $updateData = array(
                                        "name"=>$name,
                                        "meta_title"=>$importData[2],
                                        "meta_author"=>$importData[3],
                                        "meta_keywords"=>$importData[4],
                                        "meta_desc"=>$meta_desc,
                                        "about"=>$about,
                                        "url"=>$url
                                    );
                                    $author->update($updateData);
                                    $author->status = 1;
                                    $author->updatedBy=Auth::guard('admin')->user()->id;
                                    $author->save();
                                }else{
                                    $author = Author::where('name',$name)->first();
                                    if(!isset($author->id)){
                                        $insertData = array(
                                            "name"=>$name,
                                            "meta_title"=>$importData[2],
                                            "meta_author"=>$importData[3],
                                            "meta_keywords"=>$importData[4],
                                            "meta_desc"=>$meta_desc,
                                            "about"=>$about,
                                            "url"=>$url
                                        );
                                        $author = Author::create($insertData);
                                        $author->status = 1;
                                        $author->custom_id='AUID'.$author->id;
                                        $author->createdBy=Auth::guard('admin')->user()->id;
                                        $author->save();
                                    }
                                    else{
                                        $updateData = array(
                                            "name"=>$name,
                                            "meta_title"=>$importData[2],
                                            "meta_author"=>$importData[3],
                                            "meta_keywords"=>$importData[4],
                                            "meta_desc"=>$meta_desc,
                                            "about"=>$about,
                                            "url"=>$url
                                        );
                                        $author->update($updateData);
                                        $author->status = 1;
                                        $author->updatedBy=Auth::guard('admin')->user()->id;
                                        $author->save();
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
