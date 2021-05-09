<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', 'HomeController@index')->name('home');



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');


/* Sitemap Route*/
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.xml');
Route::get('/stories-sitemap.xml', 'SitemapController@blogs');
Route::get('/quotes-sitemap.xml', 'SitemapController@quotes');
Route::get('/authors-sitemap.xml', 'SitemapController@authors');
Route::get('/categories-sitemap.xml', 'SitemapController@categories');
Route::get('/tags-sitemap.xml', 'SitemapController@tags');
Route::get('/pages-sitemap.xml', 'SitemapController@pages');


Route::get('/about-us', 'HomeController@about')->name('about');
Route::get('/contact-us', 'HomeController@contact')->name('contact');
Route::get('/copyright', 'HomeController@copyright')->name('copyright');
Route::get('/privacy-policy', 'HomeController@privacy')->name('privacy-policy');

Route::get('/text/all', 'HomeController@allText')->name('all-text');
Route::get('/text/latest', 'HomeController@latestText')->name('latest-text');
Route::get('/text/trending', 'HomeController@trendText')->name('trend-text');
Route::get('/text/{url}', 'HomeController@singleText')->name('single-text');


Route::get('/videos/all', 'HomeController@allVideo')->name('all-video');
Route::get('/video/{url}', 'HomeController@singleVideo')->name('single-video');
Route::get('/gifs/all', 'HomeController@allGif')->name('all-gif');
Route::get('/gif/{url}', 'HomeController@singleGif')->name('single-gif');
Route::get('/picture/{url}', 'HomeController@singleImage')->name('single-image');
Route::get('/pictures/all', 'HomeController@allImages')->name('all-images');
Route::get('/pictures/latest', 'HomeController@latestImages')->name('latest-images');
Route::get('/pictures/trending', 'HomeController@trendImages')->name('trend-images');

Route::get('/tag/{url}', 'HomeController@tag')->name('tag');
Route::get('/tags/trending', 'HomeController@trendTags')->name('trend-tag');
Route::get('/tags/popular', 'HomeController@popularTags')->name('popular-tag');
Route::get('/tags/all', 'HomeController@allTags')->name('all-tag');
Route::get('/tag/{url}/text', 'HomeController@tagTextMore')->name('tag-text-more');
Route::get('/tag/{url}/pictures', 'HomeController@tagImageMore')->name('tag-image-more');

Route::get('/author/{url}', 'HomeController@author')->name('author');
Route::get('/authors/popular', 'HomeController@popularAuthors')->name('popular-author');
Route::get('/authors/all', 'HomeController@allAuthors')->name('all-author');
Route::get('/author/{url}/text', 'HomeController@authorTextMore')->name('author-text-more');
Route::get('/author/{url}/pictures', 'HomeController@authorImageMore')->name('author-image-more');

Route::get('/category/{url}', 'HomeController@category')->name('category');
Route::get('/categories', 'HomeController@allCategory')->name('all-category');
Route::get('/category/{url}/text', 'HomeController@categoryTextMore')->name('category-text-more');
Route::get('/category/{url}/pictures', 'HomeController@categoryImageMore')->name('category-image-more');

Route::get('/stories', 'HomeController@blog')->name('blog');
Route::get('/stories/{url}', 'HomeController@singleBlog')->name('single-blog');

Route::get('/search', 'HomeController@search')->name('search');
Route::get('/search/more/text', 'HomeController@searchTextMore')->name('search-text-more');
Route::get('/search/more/pictures', 'HomeController@searchImageMore')->name('search-image-more');
// deletable
Route::get('/tagsUrlFillsDefault', 'HomeController@tagsUrlFillsDefault')->name('tagsUrlFillsDefault');
Route::get('/quotesUrlFillsDefault', 'HomeController@quotesUrlFillsDefault')->name('quotesUrlFillsDefault');
Route::get('/authorsUrlFillsDefault', 'HomeController@authorsUrlFillsDefault')->name('authorsUrlFillsDefault');
Route::get('/socialfills', 'HomeController@socialFills')->name('socialFills');
Route::get('/socialfillsDefault', 'HomeController@socialFillsDefault')->name('socialFillsDefault');
// end deletable
Route::post('/count-shares', 'HomeController@countShares')->name('count-shares');
Route::post('/count-shares-blog', 'HomeController@countSharesBlog')->name('count-shares-blog');
/*Route::get('/dropAllTables', function() {
    $exitCode = Artisan::call('migrate:fresh --seed');
    dd('successfully Fresh');
});*/



// Admin auth group 'auth.admin',
Route::group(['prefix' => 'admin', 'middleware' => ['checkAdmin'], 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    //dashboard
    Route::get('/', 'AdminController@dashboard')->name('dashboard');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');


    // Clients
    Route::post('clients/deactive', 'ClientsController@massDeactive')->name('clients.massDeactive');
    Route::post('clients/active', 'ClientsController@massActive')->name('clients.massActive');
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // Authors
    Route::post('authors/import', 'AuthorsController@uploadAuthors')->name('authors.uploadAuthors');
    Route::post('popular-authors','AuthorsController@popularUpdate')->name('authors.popular-update');
    Route::get('popular-authors','AuthorsController@popular')->name('authors.popular');
    Route::post('authors/deactive', 'AuthorsController@massDeactive')->name('authors.massDeactive');
    Route::post('authors/active', 'AuthorsController@massActive')->name('authors.massActive');
    Route::delete('authors/destroy', 'AuthorsController@massDestroy')->name('authors.massDestroy');
    Route::resource('authors', 'AuthorsController',['middleware' => 'convertUrl']);

    // Tags
    Route::post('tags/import', 'TagsController@uploadTags')->name('tags.uploadTags');
    Route::post('popular-tags','TagsController@popularUpdate')->name('tags.popular-update');
    Route::get('popular-tags','TagsController@popular')->name('tags.popular');
    Route::post('trend-tags','TagsController@trendUpdate')->name('tags.trend-update');
    Route::get('trend-tags','TagsController@trend')->name('tags.trend');
    Route::post('tags/deactive', 'TagsController@massDeactive')->name('tags.massDeactive');
    Route::post('tags/active', 'TagsController@massActive')->name('tags.massActive');
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController',['middleware' => 'convertUrl']);

    // Sub Admins
    Route::post('sub_admins/deactive', 'SubAdminController@massDeactive')->name('sub_admins.massDeactive');
    Route::post('sub_admins/active', 'SubAdminController@massActive')->name('sub_admins.massActive');
    Route::delete('sub_admins/destroy', 'SubAdminController@massDestroy')->name('sub_admins.massDestroy');
    Route::resource('sub_admins', 'SubAdminController');

    // Categories
    Route::post('top-categories','CategoryController@topUpdate')->name('categories.top-update');
    Route::get('top-categories','CategoryController@top')->name('categories.top');
    Route::post('category/deactive', 'CategoryController@massDeactive')->name('categories.massDeactive');
    Route::post('category/active', 'CategoryController@massActive')->name('categories.massActive');
    Route::delete('category/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController',['middleware' => 'convertUrl']);


    // Quotes
    Route::post('quotes/import', 'QuoteController@uploadQuotes')->name('quotes.uploadQuotes');
    Route::post('quotes/deactive', 'QuoteController@massDeactive')->name('quotes.massDeactive');
    Route::post('quotes/active', 'QuoteController@massActive')->name('quotes.massActive');
    Route::delete('quotes/destroy', 'QuoteController@massDestroy')->name('quotes.massDestroy');
    Route::resource('quotes', 'QuoteController',['middleware' => 'convertUrl']);

    // Blogs
    Route::post('blogs/import', 'BlogsController@uploadQuotes')->name('blogs.uploadBlogs');
    Route::post('blogs/deactive', 'BlogsController@massDeactive')->name('blogs.massDeactive');
    Route::post('blogs/active', 'BlogsController@massActive')->name('blogs.massActive');
    Route::delete('blogs/destroy', 'BlogsController@massDestroy')->name('blogs.massDestroy');
    Route::resource('blogs', 'BlogsController',['middleware' => 'convertUrl']);

    // Keywords
    Route::delete('keywords/destroy', 'KeywordsController@massDestroy')->name('keywords.massDestroy');
    Route::resource('keywords', 'KeywordsController');

    // Settings
    Route::post('settings/update-settings', 'SettingsController@updateSetting')->name('settings.updateSetting');
    Route::get('settings/edit-settings', 'SettingsController@editSetting')->name('settings.editSetting');
    Route::resource('settings', 'SettingsController');

    // change password
    Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
    Route::post('password', 'ChangePasswordController@update')->name('password.update');

});

// Admin group
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('post.login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

});
