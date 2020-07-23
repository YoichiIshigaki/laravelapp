<?php

use App\Http\Middleware\HelloMiddleware;
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
$html = <<<EOF
<html>
<head>
<title>HELLO</title>
<style>
    body{
        font-size:16pt;
        color:#999;
    }
    h1{
        font-size:100pt;
        text-align:right;
        color:#eee;
        margin:-40px 0px -50px 0px;
    }
</style>
</head>
<body>
    <h1>HELLO</h1>
    <p>これはサンプルページです。</p>
</body>
</html>
EOF;



Route::get('/', function () {
    return view('welcome');
});


/*
Route::get('hello', function () {
    return "<html><body><h1>HELLO</h1><p>This is sample page.</p></body></html>";
});
*/

Route::get('hello2', function () use($html){
    return $html;
});

Route::get('hello3/{msg}', function($msg){

    $html = <<<EOF
<html>
<head>
<title>HELLO</title>
<style>
    body{
        font-size:16pt;
        color:#999;
    }
    h1{
        font-size:100pt;
        text-align:right;
        color:#eee;
        margin:-40px 0px -50px 0px;
    }
</style>
</head>
<body>
    <h1>HELLO</h1>
    <p>{$msg}</p>
    <p>これはサンプルページです。</p>
</body>
</html>
EOF;


    return $html;
});

Route::get('hello4/{id}/{pass}', function ($id,$pass){
    
    $html = <<<EOF
    <html>
    <head>
    <title>HELLO</title>
    <style>
        body{
            font-size:16pt;
            color:#999;
        }
        h1{
            font-size:100pt;
            text-align:right;
            color:#eee;
            margin:-40px 0px -50px 0px;
        }
    </style>
    </head>
    <body>
        <h1>HELLO</h1>
        <p>id:{$id}</p>
        <p>password:{$pass}</p>
        <p>これはサンプルページです。</p>
    </body>
    </html>
    EOF;

    return $html;
});

Route::get('hello5/{msg?}', function ($msg="no message"){
    
    $html = <<<EOF
    <html>
    <head>
    <title>HELLO</title>
    <style>
        body{
            font-size:16pt;
            color:#999;
        }
        h1{
            font-size:100pt;
            text-align:right;
            color:#eee;
            margin:-40px 0px -50px 0px;
        }
    </style>
    </head>
    <body>
        <h1>HELLO</h1>
        <p>password:{$msg}</p>
        <p>これはサンプルページです。</p>
    </body>
    </html>
    EOF;

    return $html;

});

//Route::get('controller',"HelloController@index");

Route::get('controller2/{id?}/{pass?}',"HelloController@index2");

Route::get('controller3',"HelloController@index3");
Route::get('controller3/other',"HelloController@other");

Route::get('controller4',"HelloController");

Route::get('controller5',"HelloController@index_request_resopnse");




/*
Route::get('Index',function(){
    return view("hello.index");
});
*/



Route::get('Index2',"HelloController@index_view");

Route::get('Index3',"HelloController@index_vari");

Route::get('Index4/{id?}',"HelloController@index_two_vari");

Route::get('Index5',"HelloController@index_query");

//Route::get('/hello',"HelloController@index_blade");

/*
Route::get('/form',"HelloController@index_form");

Route::post('/form',"HelloController@post");
*/

//Route::get('/foreach',"HelloController@index_foreach");

//Route::get('/foreach',"HelloController@index_foreach");

//Route::get('/for',"HelloController@index_continue_break");

Route::get('/forloop',"HelloController@index_loop");


Route::get("/hello","HelloController@index");

Route::post("/hello","HelloController@post");


Route::get("/hello/add","HelloController@add");

Route::post("/hello/add","HelloController@create");

Route::get("hello/edit","HelloController@edit");

Route::post("hello/edit","HelloController@update");

Route::get("/hello/del","HelloController@del");

Route::post("/hello/del","HelloController@remove");

Route::get("/hello/show","HelloController@show");

Route::get("/person","PersonController@index");

Route::get("person/find","PersonController@find");
Route::post("person/find","PersonController@search");

Route::get("person/add","PersonController@add");
Route::post("person/add","PersonController@create");

Route::get("person/edit","PersonController@edit");
Route::post("person/edit","PersonController@update");

Route::get("person/del","PersonController@del");
Route::post("person/del","PersonController@remove");

Route::get("board","BoardController@index");

Route::get("board/add","BoardController@add");
Route::post("board/add","BoardController@create");

Route::get("board/add","BoardController@add");
Route::post("board/add","BoardController@create");

Route::resource("rest","RestappController", ['except' => ['create', 'edit']]);

Route::get("hello/rest","HelloController@rest");


//Route::post("/hello","HelloController@post");



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/hello","HelloController@index")->middleware("auth");

Route::get('hello/auth', 'HelloController@getAuth');
Route::post('hello/auth', 'HelloController@postAuth');

