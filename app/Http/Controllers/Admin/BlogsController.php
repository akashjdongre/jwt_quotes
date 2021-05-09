<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Category;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveBlogRequest;
use App\Http\Requests\MassDestroyBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogs = Blog::orderBy('id', 'DESC')->get();

        return view('admin.pages.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('status',1)->get();
        return view('admin.pages.blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {

        $blog = Blog::create($request->all());
        if ($files = $request->file('image')) {

            $fileName =  "blog-".time().'.'.$request->image->getClientOriginalExtension();

            Helper::compress($request->image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $blog->image = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $blog->meta_image = $fileName;
        }
        $blog->custom_id='BID'.$blog->id;
        $blog->save();

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$blog->load('tags');
        return view('admin.pages.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::where('status',1)->get();

        return view('admin.pages.blogs.edit', compact('categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //dd($request->image); die;
        $blog->update($request->all());
        if ($files = $request->file('image')) {

            //code for remove old file
            if($blog->image != ''  && $blog->image != null){
                unlink(storage_path('app/public/image/'.$blog->image));
            }

            $fileName =  "blog-".time().'.'.$request->image->getClientOriginalExtension();

            Helper::compress($request->image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $blog->image = $fileName;
        }
        if ($files = $request->file('meta_image')) {

            //code for remove old file
            if($blog->meta_image != ''  && $blog->meta_image != null){
                unlink(storage_path('app/public/image/'.$blog->meta_image));
            }

            $fileName =  "meta-".time().'.'.$request->meta_image->getClientOriginalExtension();

            Helper::compress($request->meta_image->getRealPath(), storage_path('app/public/image/'). $fileName);
            //$request->image->storeAs('image', $fileName);

            $blog->meta_image = $fileName;
        }
        $blog->save();

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        //code for remove old file
        if($blog->image != ''  && $blog->image != null){
            unlink(storage_path('app/public/image/'.$blog->image));
        }

        //code for remove old file
        if($blog->meta_image != ''  && $blog->meta_image != null){
            unlink(storage_path('app/public/image/'.$blog->meta_image));
        }
        
        $blog->delete();

        return back();
    }

    public function massDestroy(MassDestroyBlogRequest $request)
    {
        $blogs=Blog::whereIn('id', request('ids'))->get();

        foreach($blogs as $blog){
            //code for remove old file
            if($blog->image != ''  && $blog->image != null){
                unlink(storage_path('app/public/image/'.$blog->image));
            }

            //code for remove old file
            if($blog->meta_image != ''  && $blog->meta_image != null){
                unlink(storage_path('app/public/image/'.$blog->meta_image));
            }

        }


        Blog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function massActive(MassActiveBlogRequest $request)
    {
        Blog::whereIn('id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveBlogRequest $request)
    {
        Blog::whereIn('id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
