@extends('front.layouts.app')


@section('meta_title')
    <title>Contacts us | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content=""/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content=""/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Contacts us | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="" /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Contacts us | Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content=""> 
@endsection



@section('content')
    <div class="mt-90"></div>
    <!--------------modal ------------->

    <div class="container">
        <div class="sitemap">
            <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
            <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
            <a class="text-gray">Contact</a>
        </div>
        <div class="row">
                <div class="col-sm-7">
            <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>Contact</h1>
                </div>
                  <div class="col-sm-5">
               <span class="menu-aboutus"><a href="{{route('about')}}">About Us</a></span>
               <span class="menu-aboutus"><a href="{{route('contact')}}">Contact Us</a></span>
                <span class="menu-aboutus"><a href="{{route('copyright')}}">Copyright</a></span>
                <span class="menu-aboutus"><a href="{{route('privacy-policy')}}">Privacy Policy</a></span>
              </div>
            </div>
        <div class="row">
           <div class="col-sm-12"><p>Connect with us to get answers to your queries and provide your valuable feedback which can help us to improve our quotes and picture collection.</p></div>
            <div class="col-sm-6">
             <p><strong>Required Fields *</strong></p>

                            <form action="" method="post" accept-charset="utf-8">

                                <div class="form-group">
                                    <input name="name" id="name" class="form-control" placeholder="Name*" type="text">
                                </div>

                                <div class="form-group">
                                    <input name="telephone" id="telephone" class="form-control" placeholder="Phone *" type="text">
                                </div>

                                <div class="form-group">
                                    <input name="email" id="email" class="form-control" placeholder="Email *" type="email">
                                </div>
                                <div class="form-group">
                                    <textarea name="query" id="query" class="form-control" placeholder="Messages *"></textarea>
                                </div>

                                <div class="form-group">
                                    <input name="submit" value="Submit" class="btn btn-success btns" type="submit">
                                </div>
                            </form>

            </div>
        </div>

    </div>
@endsection


