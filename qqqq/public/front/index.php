<?php include 'home-header.php';?>
<!--div class="container pt-3">
        <form class="form">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
    </div-->
<!--div class="container-fluid cont pt-4 mt-5">
            <div class="main">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </div>
        </div-->
<div class="container-fluid cont pt-4 mt-5" id="search-banner">
    <div class="main">
        <div class="form-group form-inline">
            <div class="form-check text-white slct">
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked><b>All</b>
                </label>
            </div>
            <div class="form-check pl-3 text-white">
                <label class="form-check-label" for="radio1">
                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked><b>Text</b>
                </label>
            </div>
            <div class="form-check pl-3 text-white">
                <label class="form-check-label" for="radio2">
                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2"><b>Images</b>
                </label>
            </div>
        </div>
        <div class="form-group has-search">
            <input type="text" class="form-control" placeholder="Search">
            <span class="fa fa-search form-control-feedback" id="span"></span>
        </div>
    </div>
</div>
<!--/.Navbar-->
</div>


<div class="container bg-first">
    <div class="sec1" id="trending-tag">
        <h2 class="h2-style">Trending Tags</h2><br />
        <div class="row">
            <div class="col-sm">
                <a href="tag.php">★ Motivational Quotes</a><br />
                <a href="tag.php">★ Love Quotes</a><br />
                <a href="tag.php">★ Good Morning Messages</a><br />
                <a href="tag.php">★ Good Night Messages</a><br />
                <a href="tag.php">★ Poetry Quotes</a>
            </div>
            <div class="col-sm">
                <a href="tag.php">★ Inspirational Quotes</a><br />
                <a href="tag.php">★ Teamwork Quotes</a><br />
                <a href="tag.php">★ Sports Quotes</a><br />
                <a href="tag.php">★ Determination Quotes</a><br />
                <a href="tag.php">★ Positive Quotes</a>
            </div>
            <div class="col-sm">
                <a href="tag.php">★ Attitude Quotes</a><br />
                <a href="tag.php">★ Inspirational Quotes</a><br />
                <a href="tag.php">★ Friendship Quotes</a><br />
                <a href="tag.php">★ Nature Quotes</a><br />
                <a href="tag.php">★ Education Quotes</a>
            </div>
            <div class="col-sm">
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a>
            </div>
            <div class="col-sm">
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a><br />
                <a href="tag.php">★ Good Morning</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div clas="col-sm-12">
                <!--button class="btn btn-primary">View More</button-->
                <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="trending-tags.php">View More... &nbsp;&nbsp;&nbsp;</a></p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <section class="container-fluid">
                <div class="row">
                    <div class="">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase">Latest</a></li>
                            <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase active">Trending</a></li>
                            <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-uppercase">Quotes</a></li>
                            <li class="nav-item"><a href="" data-target="#messages" data-toggle="tab" class="nav-link small text-uppercase">Messages</a></li>
                            <li class="nav-item"><a href="" data-target="#thoughts" data-toggle="tab" class="nav-link small text-uppercase">Thoughts</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="home1" class="tab-pane fade">
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“I must not fear. Fear is the mind-killer. Fear is the little-death that brings total obliteration. I will face my fear. I will permit it to pass over me and through me. And when it has gone past I will turn the inner eye to see its path. Where the fear has gone there will be nothing. Only I will remain.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile1" class="tab-pane fade active show">
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="messages1" class="tab-pane fade">
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="messages" class="tab-pane fade">
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="thoughts" class="tab-pane fade">
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <!--<a><span class="fa fa-eye"></span><i>&nbsp;10</i></a>-->
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <div class="col-sm-12 quoteText">“Beginning today, treat everyone you meet as if they were going to be dead by midnight. Extend to them all the care, kindness and understanding you can muster, and do it with no thought of any reward. Your life will never be the same again.”<br />
                                            <p class="pt-2 pl-2"><b>-Naveen Kumar</b></p>
                                        </div>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText smallText">
                                                    <span class="fa fa-tags"></span>&nbsp;
                                                    <a href="#/quotes/tag/bene-gesserit">bene-gesserit</a>,
                                                    <a href="#/quotes/tag/fear">fear</a>,
                                                    <a href="#/quotes/tag/litany-against-fear">litany-against-fear</a>,
                                                    <a href="#/quotes/tag/motivational">motivational</a>,
                                                    <a href="#/quotes/tag/scifi">scifi</a>
                                                </div>
                                            </div>
                                            <div class="right-align1">
                                                <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                                                <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!------------------------->
                        <div class="container pt-2 pb-4">
                            <button class="btn btn-primary btn-block">View More</button>
                        </div>

                        <!------------------------->
                    </div>
                </div>
            </section>

        </div>
        <div class="col-sm-4">
            <div class="py-4" id="sidebar-shadow">
                <h4 class="h2-style pb-2">Popular Tags</h4>
                <div class="row pl-3">
                    <div clas="col-sm-6">
                        <a href="tag.php">Motivational Quotes</a><br />
                        <a href="tag.php">Love Quotes</a><br />
                        <a href="tag.php">Good Morning</a><br />
                        <a href="tag.php">Good Night Messages</a><br />
                        <a href="tag.php">Poetry Quotes</a><br />
                        <a href="tag.php">Inspirational Quotes</a><br />
                        <a href="tag.php">Teamwork Quotes</a><br />
                        <a href="tag.php">Sports Quotes</a><br />
                        <a href="tag.php">Determination Quotes</a><br />
                        <a href="tag.php">Positive Quotes</a><br />
                        <a href="tag.php">Attitude Quotes</a><br />
                        <a href="tag.php">Inspirational Quotes</a><br />
                        <a href="tag.php">Friendship Quotes</a><br />
                        <a href="tag.php">Nature Quotes</a><br />
                        <a href="tag.php">Education Quotes</a>
                    </div>
                    <div clas="col-sm-6" id="n-pl-15">
                        <a href="tag.php">Motivational Quotes</a><br />
                        <a href="tag.php">Love Quotes</a><br />
                        <a href="tag.php">Good Morning Messages</a><br />
                        <a href="tag.php">Good Night Messages</a><br />
                        <a href="tag.php">Poetry Quotes</a><br />
                        <a href="tag.php">Inspirational Quotes</a><br />
                        <a href="tag.php">Teamwork Quotes</a><br />
                        <a href="tag.php">Sports Quotes</a><br />
                        <a href="tag.php">Determination Quotes</a><br />
                        <a href="tag.php">Positive Quotes</a><br />
                        <a href="tag.php">Attitude Quotes</a><br />
                        <a href="tag.php">Inspirational Quotes</a><br />
                        <a href="tag.php">Friendship Quotes</a><br />
                        <a href="tag.php">Nature Quotes</a><br />
                        <a href="tag.php">Education Quotes</a>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div clas="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="popular-tags.php">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                </div>

            </div><br /><br />
            <div><img class="img-fluid full-img" src="img/news.png" alt="add" /></div>
            <br /><br />
            <div class="py-4" id="sidebar-shadow">
                <h4 class="h2-style pb-2">Popular Author</h4>
                <div class="row pl-3">
                    <div clas="col-sm-6">
                        <a href="author.php">Confucius</a><br />
                        <a href="author.php">A. P. J. Abdul Kalam</a><br />
                        <a href="author.php">Mark Twain</a><br />
                        <a href="author.php">William Shakespeare</a><br />
                        <a href="author.php">Swami Vivekananda</a><br />
                        <a href="author.php">Mahatma Gandhi</a><br />
                        <a href="author.php">Buddha</a><br />
                        <a href="author.php">Helen Keller</a><br />
                        <a href="author.php">Albert Einstein</a><br />
                        <a href="author.php">B. R. Ambedkar</a><br />
                        <a href="author.php">Juice Wrld</a><br />
                        <a href="author.php">Noam Chomsky</a><br />
                        <a href="author.php">Emily Dickinson</a><br />
                        <a href="author.php">Franz Kafka</a><br />
                        <a href="author.php">John Milton</a><br />
                        <a href="author.php">Amitabh Bachchan</a><br />
                        <a href="author.php">Virat Kohli</a><br />
                        <a href="author.php">Swami Vivekananda</a><br />
                        <a href="author.php">Karl Marx</a><br />
                        <a href="author.php">Harry S Truman</a>
                    </div>
                    <div clas="col-sm-6" id="n-pl-15">
                        <a href="author.php">Confucius</a><br />
                        <a href="author.php">A. P. J. Abdul Kalam</a><br />
                        <a href="author.php">Mark Twain</a><br />
                        <a href="author.php">William Shakespeare</a><br />
                        <a href="author.php">Swami Vivekananda</a><br />
                        <a href="author.php">Mahatma Gandhi</a><br />
                        <a href="author.php">Buddha</a><br />
                        <a href="author.php">Helen Keller</a><br />
                        <a href="author.php">Albert Einstein</a><br />
                        <a href="author.php">B. R. Ambedkar</a><br />
                        <a href="author.php">Juice Wrld</a><br />
                        <a href="author.php">Noam Chomsky</a><br />
                        <a href="author.php">Emily Dickinson</a><br />
                        <a href="author.php">Franz Kafka</a><br />
                        <a href="author.php">John Milton</a><br />
                        <a href="author.php">Amitabh Bachchan</a><br />
                        <a href="author.php">Virat Kohli</a><br />
                        <a href="author.php">Swami Vivekananda</a><br />
                        <a href="author.php">Karl Marx</a><br />
                        <a href="author.php">Harry S Truman</a>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div clas="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="popular-authors.php">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<section class="cont bg-img-sec pt-5 pb-3">
    <div class="container">
        <h2 class="h2-style">Latest Picture</h2><br />
        <div class="row" id="n-img">
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <a href="singleimage.php"><img src="img/portfolio/img-1.jpg" class="img-fluid" alt="img" /></a>
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-1.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-2.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <!--div class="col-sm-3 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-3.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div-->
        </div>

        <div class="row" id="n-img">
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-1.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-2.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-3.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="n-img">
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-1.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-2.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="img-shadow2">
                    <img src="img/portfolio/img-3.jpg" class="img-fluid" alt="img" />
                    <div class="img-social img-social-n" id="quotes">
                        <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                        <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                        <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                        <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                        <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center pt-2">
            <div class="n-img-button"> <a href="latestimage.php" class="btn btn-primary">View More</a></div>
        </div>
    </div>
</section>
<?php include 'footer.php';?>
