<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKeywordRequest;
use App\Http\Requests\StoreKeywordRequest;
use App\Http\Requests\UpdateKeywordRequest;
use App\Keyword;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class KeywordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('keyword_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keywords = Keyword::orderBy('id', 'DESC')->get();


        return view('admin.pages.keywords.index', compact('keywords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('keyword_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.keywords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeywordRequest $request)
    {
        $keyword = Keyword::create($request->all());

        return redirect()->route('admin.keywords.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Keyword $keyword)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('keyword_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.keywords.show', compact('keyword'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Keyword $keyword)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('keyword_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.permissions.edit', compact('keyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeywordRequest $request, Keyword $keyword)
    {
        $keyword->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keyword $keyword)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('keyword_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $keyword->delete();

        return back();
    }


    public function massDestroy(MassDestroyKeywordRequest $request)
    {
        Keyword::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
