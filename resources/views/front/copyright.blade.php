@extends('front.layouts.app')


@section('meta_title')
    <title>Copyright | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content=""/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content=""/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Copyright | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="" /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Copyright | Quotes Lluvia"> 
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
            <a class="text-gray">Copyright</a>
        </div>
        <div class="row">
                <div class="col-sm-7">
           <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>Copyright</h1>
                </div>
                  <div class="col-sm-5">
               <span class="menu-aboutus"><a href="{{route('about')}}">About Us</a></span>
               <span class="menu-aboutus"><a href="{{route('contact')}}">Contact Us</a></span>
                <span class="menu-aboutus"><a href="{{route('copyright')}}">Copyright</a></span>
                <span class="menu-aboutus"><a href="{{route('privacy-policy')}}">Privacy Policy</a></span>
              </div>
            </div>
        
<div class="row">
            <div class="col-sm-12 about-content">
             <p>All contents whether it's images, logos, pictures, categories, software, content modifications/improvements, and all other such works are the property of Quotes Lluvia.</p>
<p>All motivational quotes still remain the logical property of the respective authors. We will never assert any personal claim of an individual’s unique quotes’ copyright. Remember, the utilization of motivational quotes is done under the impartial use copyright principle.</p>
<p>Quotes Lluvia is protected by copyright as well as different intellectual property regulations. The arrangement, collection, and content’s assembly on this website are the property of Quotes Lluvia is protected by copyright laws.</p>  
<p>As Quotes Lluvia respects the set laws of the copyright of others, thus, expects others to value the same. It is the policy of Quotes Lluvia, in suitable conditions and at its option, to disable or/and terminate the users’ account who continuously invade copyrights/intellectual rights of others.
</p>
     
        

            </div>
        </div>
    </div>
@endsection
