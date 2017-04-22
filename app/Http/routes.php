<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function ()
{
    
    return view('hold');
});*/

Route::get('/', function ()
{
	$news = DB::table('news')
				->where('type', 'general')
				->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
                
    $packages = App\Package::all();
    
    $updates = DB::table('news')->where('type', 'general')->get();
    
    return view('new')->with('news', $news)
    					->with('packages', $packages)
    						->with('updates', $updates);
});

Route::get('/how_it_works', function() {
	return view('works');
});

Route::get('/all/news', 'NewsController@allNews');

Route::get('/login', function ()
{
    return \Redirect::away('/account/login');
});


Route::get('/about-us', function(){
	return view('about');
})->name('about-us');

Route::get('/account/login', function(){
	return view('login');
});
Route::post('/account/login', 'Account@login');

Route::get('/signup', function ()
{
    return \Redirect::away('account/login');
});

Route::get('/account/signup', function ()
{
    return view('signup');
});

//Password change
Route::get('/password', 'Account@pwordChange');
Route::post('/passwordChange', 'Account@changePassword');

//Referrals
Route::get('/referral/{username}', 'Account@referrals');
Route::post('/referral/signup', 'Account@refSignup');

Route::post('/account/signup', 'Account@signup');

Route::get('/account/forgot-password', function ()
{
    return view('forgotpass');
});

Route::post('/account/forgotpass', 'Account@forgotPass')->name('forgot_password');

Route::get('/account/logout', 'Account@logout');

//News
Route::get('/admin/news', function() {
	$data['user'] = Auth::user();
	$data['news'] = App\News::all();
	
	return view('admin.news', $data);
})->middleware('admin');

Route::get('/admin/news/create', function() {
	$data['user'] = Auth::user();
	
	return view('admin.create-news', $data);
})->middleware('admin');

Route::post('/admin/news/store', 'NewsController@create')->middleware('admin');

Route::get('/news/edit/{newsId}', function($newsId) {
	$data['user'] = Auth::user();
	
	$news = App\News::where('id', $newsId)->first();
	return view('admin.modify-news', $data)->with('news', $news);
})->middleware('admin', 'auth');

Route::put('/admin/news/update/{id}', 'NewsController@edit')->middleware('admin');

Route::get('/news/delete/{id}', 'NewsController@removeNews')->middleware('admin');

Route::get('/admin/dashboard', 'AdminController@dashboard')->middleware('admin');

Route::get('/dashboard', 'Front@dashboard')->middleware('auth');

Route::get('/packages/choose', function ()
{
	$data['user'] = Auth::user();
    $data['packages'] = App\Package::all();
    $data['news'] = \DB::table('news')
                ->where('type','users')
				->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
                
	return view('users.choose-package', $data);
})->middleware('auth');

Route::post('/packages/choose', 'Front@choosePackage')->middleware('auth');

Route::get('/admin/packages/create', function ()
{
	$data['user'] = Auth::user();
	return view('admin.create-package', $data);
})->middleware('admin', 'auth');

Route::post('/admin/packages/create', 'AdminController@createPackage')->middleware('admin');


Route::get('/admin/packages/manage', function ()
{
	$data['user'] = Auth::user();
	$data['packages'] = App\Package::all();
	return view('admin.manage-packages', $data);
})->middleware('admin', 'auth');

Route::get('/packages/edit/{packageId}', function($packageId) {
	$data['user'] = Auth::user();
	$data['package'] = App\Package::find($packageId);
	$head = App\PackageSub::where('package_id', $packageId)->first();
	return view('admin.modify-package', $data)->with('head', $head);
})->middleware('admin', 'auth');

Route::put('/admin/packages/update/{id}', 'AdminController@updatePackage')->middleware('admin');

Route::get('/packages/delete/{id}', 'AdminController@discardPackage')->middleware('admin');

Route::get('/packages/subscription/{sub_key}', function ($sub_key)
{
	return $sub_key;
})->middleware('admin', 'auth');

Route::get('/packages/subscription/{sub_key}', function ($sub_key)
{
	$sub = App\PackageSub::where('sub_key', $sub_key)->first();
	$upline = App\User::where('username', $sub->upline_username)->first();
	$package = App\Package::find($sub->package_id);
	return view('users.subscription', ['upline' => $upline, 'package' => $package, 'user' => Auth::user(), 'sub' => $sub]);
})->middleware('auth');

Route::get('/packages/subscribed', function ()
{
	$user = Auth::user();
	$package_ids = App\PackageSub::where('package_id', '>', 0)->where('username', $user->username)->lists('package_id')->toArray();
	$packages = App\Package::find($package_ids);
	return view('users.subscribed', ['user' => $user, 'packages' => $packages]);
})->middleware('auth');

Route::get('/payment/claim/{sub_key}', 'Front@claim')->middleware('auth');

Route::get('admin/settings', function()
{
	return view('admin.settings', ['user' => Auth::user()]);
})->middleware('admin');

Route::post('admin/settings', 'AdminController@settings')->middleware('admin');

Route::get('admin/people/manage', 'AdminController@manageUsers')->middleware('admin');

Route::get('admin/people/blocked', 'AdminController@blocked')->middleware('admin');

Route::get('/admin/people/unblock/{username}', 'AdminController@unblock');

Route::get('/admin/user-profile/{username}', 'AdminController@userDetails')->middleware('admin');

Route::post('/admin/create-user', 'AdminController@createUser')->middleware('admin');

Route::get('/stats/user-growth', 'AdminController@userGrowth')->middleware('admin');

Route::get('/stats/plan-growth', 'AdminController@planStats')->middleware('admin');

Route::get('/payment/dispute/{sub_key}', 'Front@dispute')->middleware('auth');

Route::get('/payment/complete/{sub_key}', 'Front@complete')->middleware('auth');

Route::post('/payment/upload/{sub_key}', 'Front@uploadTeller')->middleware('auth');

//Profile
Route::get('/account/profile', 'Front@profile')->middleware('auth');

Route::get('/admin/packages/subscription/{sub_key}', function($sub_key)
{
	$sub = App\PackageSub::where('sub_key', $sub_key)->first();
	$package = App\Package::find($sub->package_id);
	$data['user'] = Auth::user();
	$data['package'] = $package;
	$data['sub'] = $sub;
	return view('admin.subscription', $data);
})->middleware('admin');

Route::get('/admin/delete-user/{username}', 'AdminController@deleteUser')->middleware('admin');

Route::get('/admin/payment/delete/{sub_key}', 'AdminController@deletePayment')->middleware('admin');

Route::get('/admin/payments', 'AdminController@payments')->middleware('admin');

Route::get('/admin/package_sub', 'AdminController@packageSubs')->middleware('admin');
