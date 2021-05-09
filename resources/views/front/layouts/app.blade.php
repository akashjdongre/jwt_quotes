<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="googlebot" content="index, follow" />
    <meta name="msnbot" content="index, follow" />
    <meta name="YahooSeeker" content="index, follow" />
    <meta name="revisit-after" content="2 days">
    <meta name="distribution" content="global" />
    <meta name="rating" content="General" />
    @if (trim($__env->yieldContent('meta_title')))
        @yield('meta_title')
    @else<title>{{(isset($setting->meta_title) && $setting->meta_title!='') ? $setting->meta_title : ''}}</title>@endif
    @if (trim($__env->yieldContent('meta_desc')))
        @yield('meta_desc')
    @else<meta name="description" content="{{(isset($setting->meta_desc) && $setting->meta_desc!='') ? $setting->meta_desc : ''}}"/>@endif
    @if (trim($__env->yieldContent('meta_keywords')))
        @yield('meta_keywords')
    @else<meta name="keywords" content="{{(isset($setting->meta_keywords) && $setting->meta_keywords!='') ? $setting->meta_keywords : ''}}"/>@endif
    @if (trim($__env->yieldContent('meta_author')))
        @yield('meta_author')
    @else<meta name="author" content="{{(isset($setting->meta_author) && $setting->meta_author!='') ? $setting->meta_author : ''}}" />@endif
    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US" />
    @if(isset($type) && $type!='')
    <meta property="og:type" content="{{ $type }}" />
    @else
    <meta property="og:type" content="Website" />
    @endif
    <meta property="og:site_name" content="Quotes Lluvia" />
    @if (trim($__env->yieldContent('og_title')))
        @yield('og_title')
    @else<meta property="og:title" content="{{(isset($setting->meta_title) && $setting->meta_title!='') ? $setting->meta_title : ''}}" />@endif
    @if (trim($__env->yieldContent('og_desc')))
        @yield('og_desc')
    @else<meta property="og:description" content="{{(isset($setting->meta_desc) && $setting->meta_desc!='') ? $setting->meta_desc : ''}}" />@endif
    @if (trim($__env->yieldContent('og_image')))
        @yield('og_image')
    @else
    <meta property="og:image" content="{{ !empty($setting->default_image) ? asset('storage/setting/'.$setting->default_image) : ''  }}" />
    @endif
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="4050" />
    <meta property="og:image:height" content="1950" />
    @if (trim($__env->yieldContent('og_url')))
        @yield('og_url')
    @else<meta property="og:url" content="{{Request::url()}}" />@endif
    <!-- Twitter Card data -->
    @if (trim($__env->yieldContent('tw_card')))
        @yield('tw_card')
    @else<meta name="twitter:card" content="summary">@endif
    <meta name="twitter:site" content="@quoteslluvia">
    @if (trim($__env->yieldContent('tw_title')))
        @yield('tw_title')
    @else<meta name="twitter:title" content="{{(isset($setting->meta_title) && $setting->meta_title!='') ? $setting->meta_title : ''}}">@endif
    @if (trim($__env->yieldContent('tw_desc')))
        @yield('tw_desc')
    @else<meta name="twitter:description" content="{{(isset($setting->meta_desc) && $setting->meta_desc!='') ? $setting->meta_desc : ''}}">@endif
    @if (trim($__env->yieldContent('tw_img')))
        @yield('tw_img')
    @else<meta name="twitter:image" content="{{ !empty($setting->default_image) ? asset('storage/setting/'.$setting->default_image) : ''  }}">@endif
    <link rel="canonical" href="{{Request::url()}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('front/share-button/needsharebutton.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/bseditor.css')}}"> -->
    <link href="{{asset('front/dist/css/lightgallery.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('image/favicon.png')}}">
    <script src="{{asset('front/ckeditor/ckeditor.js')}}"></script>
    @if(isset($page) && $page=='home')<style>
        #banner {
            background: url({{ !empty($setting->banner) ? asset('storage/setting/'.$setting->banner) : ''  }});
        }
    </style>@endif
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SJBXDH8TZ5"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'G-SJBXDH8TZ5');
</script>

</head>
<body>
    <div @if(isset($page) && $page=='home') id="banner" @else id="p-banner" @endif>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top {{ (isset($page) && $page=='home') ? 'home-page' : 'o-page' }} " id="nav1">
            <div class="container-fluid">
                <!-- Navbar brand -->
              
                <a class="navbar-brand home-newheader" href="{{route('home')}}"><img src="{{asset('front/img/final-logo.png')}}" alt="logo"></a>
                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Links -->
                    <!--<div class="main" id="search-1">
                        <form class="form-inline" method="get" action="{{route('search')}}">
                            <div class="form-group has-search place-search" id="n-srch">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="search" name="q" class="form-control n-srch homeSearchInput" list="suggestion" id="n-search-top" placeholder="search" autocomplete="off">
                                <input type="hidden" name="search" class="place" value="globleSearch"/>
                                <datalist id="suggestion" class="search-dropdown-result"></datalist>
                            </div>
                        </form>
                    </div>--->
                    <!--<ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>-->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav menu-align">
                        <!-- @if(isset($headCategories) && !empty($headCategories))@foreach($headCategories as $headCat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category',['url'=>$headCat->url])}}">{{ucwords(strtolower($headCat->name))}}</a>
                        </li>
                        @endforeach @endif -->
                        <li class="nav-item menu-padding">
                            <a class="nav-link" href="{{route('all-category')}}">Categories</a>
                        </li>
                        <li class="nav-item menu-padding">
                            <a class="nav-link" href="{{route('all-author')}}">Authors</a>
                        </li>
                        <li class="nav-item menu-padding">
                            <a class="nav-link" href="{{route('all-text')}}">Text Quotes</a>
                        </li>
                        <li class="nav-item menu-padding">
                            <a class="nav-link" href="{{route('all-images')}}">Picture Quotes</a>
                        </li>
                        <li class="nav-item menu-padding">
                            <a class="nav-link" href="{{route('blog')}}">Stories</a>
                        </li>
                    </ul>
                  
                            <div class="main" id="search-1">
                        <form class="form-inline f-end" method="get" action="{{route('search')}}">
                            <div class="form-group has-search place-search" id="n-srch">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="search" name="q" class="form-control n-srch homeSearchInput" list="suggestion" id="n-search-top" placeholder="search" autocomplete="off">
                                <input type="hidden" name="search" class="place" value="globleSearch"/>
                                <datalist id="suggestion" class="search-dropdown-result"></datalist>
                            </div>
                        </form>
                    </div>
             
                </div>
            </div>
        </nav>

        <!---------------log in------------------>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!---------Login------------>
                        <div class="n-login">
                            <div class="form-title text-center">
                                <h4>Login</h4>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control login-valid @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email address...">
                                        @error('email')
                                        <span class="invalid-feedback login-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control login-valid @error('password') is-invalid @enderror" id="password" required autocomplete="current-password" placeholder="Your password...">
                                        @error('password')
                                        <span class="invalid-feedback login-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                                </form>
                            </div>
                        </div>
                        <!---------Sign up------------>
                        <div class="n-signup">
                            <div class="form-title text-center">
                                <h4>Sign Up</h4>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control sign-up-valid @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name...">
                                        @error('name')
                                        <span class="invalid-feedback sign-up-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control sign-up-valid @error('email') is-invalid @enderror" id="email"  value="{{ old('email') }}" required autocomplete="email" placeholder="Your email address...">
                                        @error('email')
                                        <span class="invalid-feedback sign-up-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <input type="password"  name="password" class="form-control sign-up-valid @error('password') is-invalid @enderror" id="password" required autocomplete="new-password" placeholder="Your password...">
                                        @error('password')
                                        <span class="invalid-feedback sign-up-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control sign-up-valid" id="password-confirm" required autocomplete="new-password" placeholder="Confirm password...">

                                    </div>
                                    <button type="submit" class="btn btn-info btn-block btn-round">Sign Up</button>
                                </form>
                            </div>
                        </div>
                        <!---------Sign up------------>
                        <hr>
                        <div class="signup-section n-login text-center">Not a member yet? <a id="n-signup" href="#a" class="text-info"> Sign Up</a>.</div>
                        <div class="signup-section n-signup text-center">Already have Account? <a id="n-login" href="#a" class="text-info"> Login</a>.</div>
                    </div>
                </div>
            </div>
        </div>
        @yield('search')
    </div>
    <!--/.Navbar-->
    
    @yield('content')
    <footer>
        <div class="container-fluid cont">
           <div class="row col-sm-10" id="footer-top">
                <div class="col-sm-12 about-p text-page">
                    <h4 class="pt-3 pb-3">ABOUT</h4>
                    {!! (isset($setting->about) && $setting->about!='') ? $setting->about : '' !!}
                </div>
                <!---<div class="col-sm-6" id="f-col-2">
{{--                    <h4 class="pt-3 pb-3">Latest Quotes</h4>--}}
{{--                    <div class="">--}}
{{--                        <a href="messages.php">Messsages</a> <br />--}}
{{--                        <a href="quotes.php">Quotes</a> <br />--}}
{{--                        <a href="thoughts.php">Thoughts</a>--}}
{{--                    </div>--}}
                    <h4 class="pt-3 pb-3">Subscribe Our Newsletter</h4>
                    <div class="main" id="foot-subscribe">
                        <div class="form-group has-search place-search" style="display: flex">
                            <span class="fa fa-envelope form-control-feedback"></span>
                            <input type="text" class="form-control" placeholder="Enter Email..." style="width: 70%">
                            <input id="sub-btn" type="submit" value="Subscribe" class="btn btn-primary" />
                        </div>
                    </div>
                </div>--->

                <!---<div class="col-sm-4">
                    <h4 class="pt-3 pb-3">Usefull Links</h4>
                    <a href="index.php">Home</a><br />
                    <a href="about-us.php">About Us</a><br />
                    <a href="blog.php">Blog</a><br />
                    <a href="contact-us.php">Contact Us</a><br />
                    <a href="{{route('all-author')}}">All Authors</a><br />
                    <a href="#">Top 100 Quotes</a><br />
{{--                    <a href="#">Sitemap</a><br />--}}
                    <a href="#">Privacy Policy</a><br />
                    <a href="#">Terms and Condition</a>
                </div>--->
            </div>
            @if(isset($footerCategories) && !$footerCategories->isEmpty())
                <div class="footer-cat">
                    <div class="row">
                            <h4 class="pt-3 pb-3">Categories</h4>
                    </div>
                    <div class="row">
                        @foreach($footerCategories as $key=>$cat)
                                <div class="col-sm-6 col-lg-3 category-size">
                                    <a href="{{route('category',['url'=>$cat->url])}}">★ {{ ucwords(strtolower($cat->name )) }}</a>
                                    <br>
                                </div>
                        @endforeach
                    </div>

                </div>
                <div class="line"></div>
            @endif
           <div class="row">
                <div class="col-lg-3" id="social-f">
                 <a class="footer-brand" href="{{route('home')}}"><img src="{{asset('front/img/footer-logo.png')}}" alt="logo"></a>
                    </div>
                <div class="col-lg-3 "id= "social-f">
                    <span class="caption">© 2020 <a href="/">Quotes Lluvia</a> All rights reserved.</span>
{{--                    <p class="pt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem libero, ducimus aliquid non illum eveniet reprehenderit rerum animi ratione possimus, perspiciatis obcaecati, assumenda magnam quos sint excepturi eius cum dolore. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate culpa assumenda eveniet explicabo doloremque hic amet error iure!</p>--}}
                </div>
             <div class="col-lg-3" id="social-f" >
                    <h4 class="pt-5 pb-3 text-white">Follow Us On</h4>
                    <div class="foot-social">
                        <a href="https://in.pinterest.com/quoteslluvia/" target="_blank"><span class="fa fa-pinterest"></span></a>
                        <a href="https://www.facebook.com/quoteslluvia" target="_blank"><span class="fa fa-facebook"></span></a>
                        <a href="https://twitter.com/quoteslluvia" target="_blank"><span class="fa fa-twitter"></span></a>
                        <a href="https://www.instagram.com/quotes.lluvia/" target="_blank"><span class="fa fa-instagram"></span></a>
                        <a href="https://www.linkedin.com/company/quoteslluvia" target="_blank"><span class="fa fa-linkedin"></span></a>
                       
                    </div>
                </div>
                </div>
              <div class="line"></div>
            <div class="row">
               <span class="bottom-footer"><a href="{{route('about')}}">About Us</a></span>
               <span class="bottom-footer"><a href="{{route('contact')}}">Contact Us</a></span>
                <span class="bottom-footer"><a href="{{route('copyright')}}">Copyright</a></span>
                <span class="bottom-footer"><a href="{{route('privacy-policy')}}">Privacy Policy</a></span>
              </div>
              </div>
           </footer>
   <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">


    @yield('scripts')
    <script>
        $(window).load(function() {
   // Animate loader off screen
   $(".se-pre-con").fadeOut("slow");;
});


$(window).on('load', function () {
   $("#status").fadeOut();
   $("#preloader").delay(500).fadeOut("slow");
})</script>
    <script>
        $(document).ready(function() {
            /** ******************************
             * Simple WYSIWYG
             ****************************** **/
            $('#editControls a').click(function(e) {
                e.preventDefault();
                switch($(this).data('role')) {
                    case 'h1':
                    case 'h2':
                    case 'h3':
                    case 'p':
                        document.execCommand('formatBlock', false, $(this).data('role'));
                        break;
                    default:
                        document.execCommand($(this).data('role'), false, null);
                        break;
                }

                var textval = $("#editor").html();
                $("#editorCopy").val(textval);
            });

            $("#editor").keyup(function() {
                var value = $(this).html();
                $("#editorCopy").val(value);
            }).keyup();

            $('#checkIt').click(function(e) {
                e.preventDefault();
                alert($("#editorCopy").val());
            });
        });
    </script>



    <script src="bseditor.js"></script>
    <script src="{{asset('front/share-button/needsharebutton.js')}}"></script>
    <script>
        new needShareDropdown(document.getElementById('share-button-1'));
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#gallery").lightGallery({
                rotate: false,
                rotateLeft:false,
                rotateRight:false,
                flipHorizontal:false,
                flipVertical:false,
                googlePlus:false,
                speed:2000,
                pause:2000,
            });
        });
    </script>
    <script src="{{asset('front/dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script>// ===== Scroll to Top ====
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});</script>


    <script type="text/javascript">

        /*******document ready*******/
        $(document).ready(function () {


            // Login signup models ///////////////////////////

                @if (count($errors) > 0)
                    $('#loginModal').modal('show');
                @endif

                @if (count($errors) > 0)
                    $('.n-login').hide();
                    $('.n-signup').show();
                    $('.login-error').remove();
                    $('.login-valid').removeClass('is-invalid');
                @else
                    $('.n-signup').hide();
                    $('.n-login').show();
                @endif

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

                $("#n-signup").click(function(){
                    $('.n-login').hide();
                    $('.n-signup').show();
                });
                $("#n-login").click(function(){
                    $('.n-signup').hide();
                    $('.n-login').show();
                });

            ///////////////// SIgn In / Sign Up /////////////////////



            ///////// Search Input Home page ///////////////////

            $(".homeSearchInput").keyup(function(e) {
                        //if(e.keyCode == 8) // extra
                     // if type anykey except backspace

                    var query=this.value; // fetch value
                console.log(query.length);
                    // if key length greate than 2
                    if(query.length>0){
                        console.log(query);
                        $.ajax({
                            headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                            dataType: "json",
                            method: 'get',
                            url:  "{{ route('search') }}",
                            data: { 'q': query ,'ajax':true },
                            success: function (res) {

                                console.log(res);
                                if (res) {
                                    if(res.success){
                                        if(res.dropdown){
                                            $(".search-dropdown-result").empty(); // empty the last dropdown
                                            $(".search-dropdown-result").append(res.dropdown); // append dropdown from search-dropdown.blade.php
                                        }
                                    }

                                }
                            }
                        })
                    }else{
                        $(".search-dropdown-result").empty(); // empty the last dropdown
                    }



            });


            ////////////////////End search result //////////////////////


            ///////// Social page redirect ///////////////////

            // $(".shareRedirect").click(function(e) {

            $(document).on("click", '.shareRedirect', function(event) {

                var share = $(this).data('share');
                var id = $(this).data('id');

                $.ajax({
                    headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                    dataType: "json",
                    method: 'post',
                    url:  "{{ route('count-shares') }}",
                    data: { 'q': share,'id': id },
                    context:this,
                    success: function (res) {
                        console.log(res);
                        if (res) {
                            if(res.success){
                                $( this ).find('i').text(' '+res.share);
                                $( this ).siblings('.total').find("i").text(' '+res.total); //
                            }
                        }
                    }
                })


            });


            //////////////////// end social page count //////////////////////


            ///////// Social page redirect ///////////////////

            // $(".shareRedirect").click(function(e) {

            $(document).on("click", '.shareRedirect1', function(event) {

                var share = $(this).data('share');
                var id = $(this).data('id');

                $.ajax({
                    headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                    dataType: "json",
                    method: 'post',
                    url:  "{{ route('count-shares-blog') }}",
                    data: { 'q': share,'id': id },
                    context:this,
                    success: function (res) {
                        console.log(res);
                        if (res) {
                            if(res.success){
                                $( this ).find('i').text(' '+res.share);
                                $( this ).siblings('.total').find("i").text(' '+res.total); //
                            }
                        }
                    }
                })


            });


            //////////////////// end social page count //////////////////////

            //////////////// view more Ajax ////////////////////////////

            $(".viewMoreAjax").click(function(e) {

                var keyword = '';
                keyword = $(this).siblings('#keyword-search').val();
                var skipValue = $(this).siblings('#skipRows').val();
                var ajaxUrl = $(this).siblings('#ajaxUrl').val();
                var takeValue = $(this).siblings('#takeRows').val();

                $.ajax({
                    headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                    dataType: "json",
                    method: 'get',
                    url:  ajaxUrl,
                    data: { 'skip': skipValue ,'take': takeValue ,'ajax':true ,'keyword':keyword},
                    context:this,
                    success: function (res) {
                        console.log(res);
                        if (res) {
                            if(res.success){
                                //append-by-ajax
                                if(res.quotes){
                                    if(res.forSearchViewMore==true){
                                        $(this).siblings('#skipRows').val(res.skipValue);
                                        $(".append-by-ajax1").append(res.quotes); // apend
                                    }else{
                                        $(this).siblings('#skipRows').val(res.skipValue);
                                        $(".append-by-ajax").append(res.quotes); // append
                                    }

                                }
                                if(res.hide=='yes'){
                                    $( this ).parent('.forHide').css('display','none');
                                }
                            }

                        }
                    }
                })
            });


            /////////////// End view more Ajax ////////////////////////////




        });
        /*******document ready*******/

        $(".read-more-link").click(function(){
                
                if($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(".about-few-data").css('height','auto');
                    $(".read-more-link").text('Read Less');
                } else {
                    $(this).addClass("less");
                    $(".about-few-data").css('height','150px');
                    $(".read-more-link").text('Read More');
                }
        });

        // $(".less-more-link").click(function(){
        //         $(".full").css('display','none');;
        //         $(".short").css('display','block');;
        // });


    </script>
 <script>
$(window).on('beforeunload', function() {
  $('body').hide();
  $(window).scrollTop(0);
});
</script>
</body>

</html>
