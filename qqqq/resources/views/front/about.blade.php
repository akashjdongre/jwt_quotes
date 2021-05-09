@extends('front.layouts.app')


@section('meta_title')
    <title>About Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content="The objective of Quotes Lluvia is to help people by providing them knowledgeable and genuine short inspirational quotes."/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content="about us"/> 
@endsection

@section('og_title')
    <meta property="og:title" content="About Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="The objective of Quotes Lluvia is to help people by providing them knowledgeable and genuine short inspirational quotes." /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="About Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content="The objective of Quotes Lluvia is to help people by providing them knowledgeable and genuine short inspirational quotes."> 
@endsection



@section('content')
    <div class="mt-90"></div>
    <!--------------modal ------------->

        <div class="container">
            <div class="sitemap">
                <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
                <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
                <a class="text-gray">About</a>
            </div>
        
            <div class="row">
                <div class="col-sm-7">
            <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>About</h1>
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
                
             <p>Welcome to Quotes Lluvia- the Ocean of Quotes for Everyone. The website is designed & developed for all those who are constantly in search of improving themselves. Besides, it opens the door wide open for them to expand their knowledge’s boundaries. Quotes Lluvia has established the site in a very short period for motivational quotes. Today it has become the ocean of inspiring and unique quotes on life, advice, stories, and many other useful things.</p>
                <h5>Our Aim</h5>
                <p>Our objective is to help people by providing them knowledgeable and genuine short inspirational quotes. These help people in their personal growth, happiness, and love in their everyday life. We have tried to cover topics on diversified are for you</p>
                <p>Irrespective of age, anyone can use Quotes Lluvia whether you are a writer, student, professional, doctor, engineer, friend, super motivational quotes will encourage everyone in a positive direction. At this platform, we have covered numerous categories from life, success, travel, women quotes, friendship quotes, etc. </p>
                <h5>Remembering the Quotes </h5>
                <p>While designing the site, we have recalled the motivational quotes and many endless memories linked to them. The team wants to feel a similar experience when readers read the motivational quotes for success. Feeling misty is a wonderful feeling, however; readers also get an opportunity to rejoice in new memories while using motivational quotes for life.</p>
                
                <h5>Desire for Quotes</h5>
                <p>We had a big bank for quotes which led to the development of Quotes Lluvia. We desire that we different quotes under one roof. The listed quotes by different authors and on various topics inspire people to read them. The passion for quotes does not end here. Start interpreting unique quotes and understand the hidden feelings, beliefs, and experience their importance in your life. The world is more beautiful than one can imagine.</p>
                <h5>Why Use Quotes Lluvia?</h5>
                <p>Quotes Lluvia provides a wonderful path to the world of unique quotations. The collection of motivational quotes for life, success, education, and other areas are getting bigger day by day. Whether it is Birthday Wishes, Self Love Quotes, Sad Love Quotes, Success Quotes, or Family or Nature Quotes, Quotes Lluvia makes it easy for every reader and visitor of the site. Also, we have quotes by authors from the past as well as the current world that actively motivates one who explores the website.</p>

<p>Today people wish to continuously increase their knowledge and develop new learning skills. Quotes Lluvia offers a successful path to bring a diversified range of topics to keep visitors up-to-date.

</p>
         

            </div>
        </div>
        </div>
@endsection


