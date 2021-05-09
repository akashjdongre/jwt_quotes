<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveCategoryRequest;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateTopCategoryRequest;
use App\Tag;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::orderBy('id', 'DESC')->get();

        return view('admin.pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::where('status',1)->get()->pluck('title', 'id');
        $categories= Category::orderBy('id', 'DESC')->get();
        return view('admin.pages.categories.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        
        $category = Category::create($request->all());
        if ($files = $request->file('meta_image')) {

            $fileName =  "category-".time().'.'.$request->meta_image->getClientOriginalExtension();
            $request->meta_image->storeAs('category', $fileName);

            $category->meta_image = $fileName;
        }
        
        $category->custom_id='CATID'.$category->id;
        $tags=$request->tags_hidden;
        if($tags[0]!=null){
            $tags=explode(",",$tags[0]);
            foreach($tags as $tag_id){
                DB::table('category_tag')->insert(
                    array(
                           'category_id'  =>  $category->id,
                           'tag_id'  =>   $tag_id,
                    )
                );
            }
        }
        $category->save();
        $sub_cats=$request->sub_cats_hidden;
        if($sub_cats[0]!=null){
            $sub_cats=explode(",",$sub_cats[0]);
            foreach($sub_cats as $sub_cat_id){
                DB::table('sub_cats')->insert(
                    array(
                           'parent_id'   =>   $category->id,
                           'sub_cat_id'  =>   $sub_cat_id
                    )
                );
            }
        }
        

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->load('tags');
        return view('admin.pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
        $category->load('tags');
        
        // tags
        $catTags=DB::table('category_tag')->where('category_id',$category->id)->get()->toArray();
        
        if(!empty($catTags)){
            $tag_ids = array_column($catTags, 'tag_id');
            $categoryTags=Tag::where('status',1)->whereIn('id',$tag_ids)->orderByRaw("field(id,".implode(',',$tag_ids).")")->get();
            $tags = Tag::where('status',1)->whereNotIn('id',$tag_ids)->get();
        }
        else{
            $categoryTags=[];
            $tags = Tag::where('status',1)->get();
        }
        
       
        // sub cats
        $sub_cats=DB::table('sub_cats')->where('parent_id',$category->id)->get()->toArray();
        if(!empty($sub_cats)){
            $sub_cat_ids = array_column($sub_cats, 'sub_cat_id');
            $subCats= Category::where('id','!=',$category->id)->whereIn('id',$sub_cat_ids)->orderByRaw("field(id,".implode(',',$sub_cat_ids).")")->get();
            $categories= Category::where('id','!=',$category->id)->whereNotIn('id',$sub_cat_ids)->get();
        }
        else{
            $subCats=[];
            $categories = Category::where('id','!=',$category->id)->get();
        }
        
        return view('admin.pages.categories.edit', compact('tags','categoryTags','category','categories','subCats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {   
        $category->update($request->all());
        if ($files = $request->file('meta_image')) {

            //code for remove old file
            if($category->meta_image != ''  && $category->meta_image != null){
                unlink(storage_path('app/public/category/'.$category->meta_image));
            }

            $fileName =  "category-".time().'.'.$request->meta_image->getClientOriginalExtension();
            $request->meta_image->storeAs('category', $fileName);

            $category->meta_image = $fileName;
        }

        $tags=$request->tags_hidden;
        if($tags[0]!=null){
            
            $tags=explode(",",$tags[0]);
            DB::table('category_tag')->where('category_id',$category->id)->delete();
            foreach($tags as $tag_id){
                DB::table('category_tag')->insert(
                    array(
                           'category_id'  =>  $category->id,
                           'tag_id'  =>   $tag_id,
                    )
                );
            }
        }
        $category->save();
        $sub_cats=$request->sub_cats_hidden;
        if($sub_cats[0]!=null){
            
            $sub_cats=explode(",",$sub_cats[0]);
            DB::table('sub_cats')->where('parent_id',$category->id)->delete();
            foreach($sub_cats as $sub_cat_id){
                DB::table('sub_cats')->insert(
                    array(
                           'parent_id'   =>   $category->id,
                           'sub_cat_id'  =>   $sub_cat_id
                    )
                );
            }
        }
        if($request->status==2){ // deactive
            $now=now();
            DB::table('top_cats')->where('cat_id', $category->id)->update(['deleted_at' =>$now]);
        }
        if($request->status==1){
            DB::table('top_cats')->where('cat_id',$category->id)->update(['deleted_at' =>null]);
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        //code for remove old file
        if($category->meta_image != ''  && $category->meta_image != null){
            unlink(storage_path('app/public/category/'.$category->meta_image));
        }


        DB::table('category_tag')->where('category_id',$category->id)->delete();
        DB::table('top_cats')->where('cat_id',$category->id)->delete();
        DB::table('sub_cats')->where('parent_id',$category->id)->delete();

        Blog::where('category',$category->id)->delete();
        
        $category->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        $categories=Category::whereIn('id', request('ids'))->get();

        foreach($categories as $category){
            //code for remove old file
            if($category->meta_image != ''  && $category->meta_image != null){
                unlink(storage_path('app/public/category/'.$category->meta_image));
            }
        }
        

        DB::table('category_tag')->whereIn('category_id',request('ids'))->delete();
        DB::table('top_cats')->whereIn('cat_id',request('ids'))->delete();
        DB::table('sub_cats')->where('parent_id',request('ids'))->delete();

        Blog::whereIn('category',request('ids'))->delete();

        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massActive(MassActiveCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function top()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('top_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        

        $top_cats=DB::table('top_cats')->select('cat_id')->get()->toArray();
        if(!empty($top_cats)){

            $cat_ids = array_column($top_cats, 'cat_id');

            $topCats=Category::where('status',1)->whereIn('id',$cat_ids)->orderByRaw("field(id,".implode(',',$cat_ids).")")->get();

            $cats = Category::where('status',1)->whereNotIn('id',$cat_ids)->get();
        }
        else{
            $cats = Category::where('status',1)->get();
            $topCats=[];
        }
        


        return view('admin.pages.categories.top', compact('topCats','cats'));
    }


    public function topUpdate(UpdateTopCategoryRequest $request)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('top_category_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        

        $cats=$request->cats_hidden;
        if($cats[0]!=null){

            DB::table('top_cats')->truncate();
            $cats=explode(",",$cats[0]);

            $data=[];
            foreach($cats as $cat){
                $data[]= array('cat_id' => $cat);
            }

            DB::table('top_cats')->insert($data);

        }


        return redirect()->route('admin.categories.top')->with('message','Top Categories saved Successfully');

    }

}
