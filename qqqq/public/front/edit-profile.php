<?php include 'other-header.php';?>
<div class="mt-90"></div>
<!--------------modal ------------->
<!-- The Modal -->
<div class="modal fade" id="n-myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="h-edit">
                    <h4 class="h-edit1">Edit Profile</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <!-- form user info -->
                    <div class="card card-outline-secondary" style="margin: auto">
                        <!--div class="card-header">
                                            <h3 class="mb-0">User Information</h3>
                                        </div--->
                        <div class="card-body">
                            <form autocomplete="off" class="form" role="form">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <img src="img/authors.png" alt="authors" class="img-fluid" />
                                    </div>
                                    <div class="col-sm-9" id="f-img1">
                                        <div class="file btn btn-outline-success btn-block" id="n-file-btn">
                                            Choose image
                                            <input type="file" name="file" />
                                        </div>
                                        <button class="btn btn-outline-success btn-block">Upload</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Jane">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="Bishop">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" value="email@gmail.com">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mobile Number</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" value="999009909">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Date Of Birth</label>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control" id="exampleInputDOB1" placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Country</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="user_time_zone" size="0">
                                            <option value="India">
                                                India
                                            </option>
                                            <option value="America">
                                                America
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">State</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="user_time_zone" size="0">
                                            <option value="India">
                                                Uttar Pradesh
                                            </option>
                                            <option value="America">
                                                Delhi
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">City</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="user_time_zone" size="0">
                                            <option value="India">
                                                Noida
                                            </option>
                                            <option value="America">
                                                gaziabad
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Old Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="Old Password">
                                        <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="New Password">
                                        <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Confirm Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="Confirm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="btn-center"><button class="btn btn-outline-success">Update</button></div>
                                </div>
                                <!--div class="form-group row">
                                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                                    <div class="col-lg-9">
                                                        <input class="btn btn-secondary" type="reset" value="Cancel">
                                                        <input class="btn btn-primary" type="button" value="Save Changes">
                                                    </div>
                                                </div-->
                            </form>
                        </div>
                    </div><!-- /form user info -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal footer -->

</div>
<!--------------modal ------------->
<div class="container bg-first mb-4">
    <div class="p-sec1" id="trending-tag">
        <div class="row">
            <div class="col-sm-3">
                <img class="img-fluid" src="img/authors.png" alt="authors" />
            </div>
            <div class="col-sm-9 text-dark">
                <div class="row">
                    <div class="col-sm-12 quoteText">
                        <div style="float: left">

                        </div>
                        <div style="float: right">

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <h4 class="h2-style pb-2 txt-theme">Naveen Kumar<span>✓</span></h4>
                            </div>
                            <div class="col-sm text-center">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#n-myModal">Edit</button>
                            </div>
                            <div class="col-sm">
                                <p><b>Joined 2 Dec 2019</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 quoteText">
                        <hr>
                    </div>

                    <div class="col-sm-12 quoteText">
                        <h4 class="text-left">About</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum omnis dolorem molestias deserunt, reprehenderit. Repudiandae molestias odit, ullam porro amet hic, libero distinctio, nisi autem a illo debitis, adipisci tempora.</p>
                        <p><b>Website:</b><i> <a href="www.naveenkumar.website">www.naveenkumar.website</a></i></p>
                    </div><br />
                    <!--------------social---------------->
                    <div class="col-sm-12 quoteText" id="quotes">
                        <div class="left-align1" id="profile-social">
                            <div class="greyText smallText">
                                <a href="#" target="_blank"><span class="fa fa-facebook-square"></span></a>
                                <a href="#" target="_blank"><span class="fa fa-twitter-square"></span></a>
                                <a href="#" target="_blank"><span class="fa fa-instagram"></span></a>
                                <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span></a>
                                <!--a href="#" target="_blank"><span class="fa fa-whatsapp"></span></a-->
                            </div>
                        </div>
                        <div id="share-button-1" class="need-share-button-default right-align1" data-share-position="topCenter"></div>
                        <!---div class="right-align1">
                               <div id="share-button-1" class="need-share-button-default" data-share-position="topCenter"></div>
                                <button class="btn btn-outline-primary"><span class="fa fa-share"></span> Share Profile</button>
                            </div--->
                    </div>
                    <!--------------social---------------->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <section class="container-fluid">
                <div class="row">
                    <!-------------editor start-------------------->
                    <!-------------ck editor start-------------------->
                    <section class="ed-section">
                        <div class="text">
                            <img class="img-fluid pr-img" src="https://scontent.fdel11-1.fna.fbcdn.net/v/t1.0-9/66838155_2381995612079577_3117126124853788672_n.jpg?_nc_cat=107&_nc_ohc=cwX_Fb92aUUAX91kbmn&_nc_ht=scontent.fdel11-1.fna&oh=ce8ad88ebb9cd52bde16e01152141ea3&oe=5ED81F18" />
                            <textarea class="n-textarea" placeholder="What's in your mind"></textarea>
                            <!--form class="form-inline" action="/action_page.php">
                                <div class="form-group">
                                    <input class="input-file" type="file" name="file" value="file" />
                                </div>
                                <div class="form-group">
                                    <input class="input-file" type="text" name="tags" value="tags" />
                                </div>
                                <div class="form-group">
                                    <select class="form-control input-file" id="sel2" name="sellist2">
                                        <option selected>All</option>
                                        <option>Text</option>
                                        <option>Images</option>
                                    </select>
                                </div>
                            </form--->
                            <div class="d-flex justify-content-around mb-3 n-div">
                                <div class="p-2"><input class="n-tags1 n-choose-file" type="file" name="file" value="file" /></div>
                                <div class="p-2"><input class="n-tags1" type="text" name="tags" value="tags" /></div>
                                <div class="p-2"><select class="form-control" id="sel2" name="sellist2">
                                        <option selected>Message</option>
                                        <option>Quotes</option>
                                        <option>Thoughts</option>
                                        <option>Images</option>
                                    </select></div>
                                <div class="p-2"><input type="submit" value="post" /></div>
                            </div>
                        </div>
                    </section>
                    <!-------------ck editor start-------------------->

                    <!-------------editor start-------------------->
                    <div class="pt-4">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#quotes1" data-toggle="tab" class="nav-link small text-uppercase">Quotes</a></li>
                            <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link small text-uppercase active">Messages</a></li>
                            <li class="nav-item"><a href="" data-target="#thoughts1" data-toggle="tab" class="nav-link small text-uppercase">Thoughts</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="quotes1" class="tab-pane fade">
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="messages1" class="tab-pane fade active show">
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="thoughts1" class="tab-pane fade">
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                                        <div class="col-sm-12 text-left pt-2">
                                            <button class="btn btn-primary">Edit</button>
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
                        <a href="#">Motivational Quotes</a><br />
                        <a href="#">Love Quotes</a><br />
                        <a href="#">Good Morning</a><br />
                        <a href="#">Good Night Messages</a><br />
                        <a href="#">Poetry Quotes</a><br />
                        <a href="#">Inspirational Quotes</a><br />
                        <a href="#">Teamwork Quotes</a><br />
                        <a href="#">Sports Quotes</a><br />
                        <a href="#">Determination Quotes</a><br />
                        <a href="#">Positive Quotes</a><br />
                        <a href="#">Attitude Quotes</a><br />
                        <a href="#">Inspirational Quotes</a><br />
                        <a href="#">Friendship Quotes</a><br />
                        <a href="#">Nature Quotes</a><br />
                        <a href="#">Education Quotes</a>
                    </div>
                    <div clas="col-sm-6" id="n-pl-15">
                        <a href="#">Motivational Quotes</a><br />
                        <a href="#">Love Quotes</a><br />
                        <a href="#">Good Morning Messages</a><br />
                        <a href="#">Good Night Messages</a><br />
                        <a href="#">Poetry Quotes</a><br />
                        <a href="#">Inspirational Quotes</a><br />
                        <a href="#">Teamwork Quotes)</a><br />
                        <a href="#">Sports Quotes</a><br />
                        <a href="#">Determination Quotes</a><br />
                        <a href="#">Positive Quotes</a><br />
                        <a href="#">Attitude Quotes</a><br />
                        <a href="#">Inspirational Quotes</a><br />
                        <a href="#">Friendship Quotes</a><br />
                        <a href="#">Nature Quotes</a><br />
                        <a href="#">Education Quotes</a>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div clas="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="#">View More... &nbsp;&nbsp;&nbsp;</a></p>
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
                        <a href="#">Confucius</a><br />
                        <a href="#">A. P. J. Abdul Kalam</a><br />
                        <a href="#">Mark Twain</a><br />
                        <a href="#">William Shakespeare</a><br />
                        <a href="#">Swami Vivekananda</a><br />
                        <a href="#">Mahatma Gandhi</a><br />
                        <a href="#">Buddha</a><br />
                        <a href="#">Helen Keller</a><br />
                        <a href="#">Albert Einstein</a><br />
                        <a href="#">B. R. Ambedkar</a><br />
                        <a href="#">Juice Wrld</a><br />
                        <a href="#">Noam Chomsky</a><br />
                        <a href="#">Emily Dickinson</a><br />
                        <a href="#">Franz Kafka</a><br />
                        <a href="#">John Milton</a><br />
                        <a href="#">Amitabh Bachchan</a><br />
                        <a href="#">Virat Kohli</a><br />
                        <a href="#">Swami Vivekananda</a><br />
                        <a href="#">Karl Marx</a><br />
                        <a href="#">Harry S Truman</a>
                    </div>
                    <div clas="col-sm-6" id="n-pl-15">
                        <a href="#">Confucius</a><br />
                        <a href="#">A. P. J. Abdul Kalam</a><br />
                        <a href="#">Mark Twain</a><br />
                        <a href="#">William Shakespeare</a><br />
                        <a href="#">Swami Vivekananda</a><br />
                        <a href="#">Mahatma Gandhi</a><br />
                        <a href="#">Buddha</a><br />
                        <a href="#">Helen Keller</a><br />
                        <a href="#">Albert Einstein</a><br />
                        <a href="#">B. R. Ambedkar</a><br />
                        <a href="#">Juice Wrld</a><br />
                        <a href="#">Noam Chomsky</a><br />
                        <a href="#">Emily Dickinson</a><br />
                        <a href="#">Franz Kafka</a><br />
                        <a href="#">John Milton</a><br />
                        <a href="#">Amitabh Bachchan</a><br />
                        <a href="#">Virat Kohli</a><br />
                        <a href="#">Swami Vivekananda</a><br />
                        <a href="#">Karl Marx</a><br />
                        <a href="#">Harry S Truman</a>
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <div class="row">
                        <div clas="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="#">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<section class="mt-5">
    <div class="container pt-4 pb-4">
        <h2 class="h2-style">Your Posted Images</h2>
        <br />
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>
                            <h4 class="text-dark">Images</h4>
                        </th>
                        <th>
                            <h4 class="text-dark">Date & Time</h4>
                        </th>
                        <th>
                            <h4 class="text-dark">Social</h4>
                        </th>
                        <th>
                            <h4 class="text-dark">Edit</h4>
                        </th>
                        <th>
                            <h4 class="text-dark">Delete</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="img/logo.jpg" class="img-fluid" alt="img name" height="100px" /></td>
                        <td>
                            <h5>01/10/2020, 12:45PM</h5>
                        </td>
                        <td class="edit-social" id="quotes">
                            <a><span class="fa fa-heart"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;57</i></a>
                            <a href="#" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;47</i></a>
                            <a href="#" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;80</i></a>
                            <a href="#" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;77</i></a>
                            <a href="#" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;93</i></a>
                        </td>
                        <td><button class="btn btn-primary">Edit</button></td>
                        <td> <button class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</section>
<?php include 'footer.php';?>
