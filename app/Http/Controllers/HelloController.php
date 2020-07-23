<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Person;

global $head,$style,$body,$end;

$head = "<html><head>";
$style = <<<EOF
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
    EOF;

$body = "</head><body>";
$end = "</body></html>";

function tag($tag,$txt){
    return "<{$tag}>".$txt."</{$tag}>";
}


class HelloController extends Controller
{   
    /*
    public function index(){

        return <<<EOF
        <html>
        <head>
        <title>Hello/Index</title>
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
            <h1>INDEX</h1>
            <p>Helloコントローラーのindexアクションです。</p>
        </body>
        </html>
        EOF;
    }
    */
    

    

    public function index2($id="noname",$pass="unknown"){
        return <<<EOF
        <html>
        <head>
        <title>Hello/Index</title>
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
            <h1>INDEX</h1>
            <p>Helloコントローラーのindex2アクションです。</p>
            <ul>
                <li>ID:{$id}</li>
                <li>PASS:{$pass}</li>
            </ul>
        </body>
        </html>
        EOF;
    }

    public function index3(){
        global $head,$style,$body,$end;

        $html = $head.tag("title","Hello/Index").$style.$body
        .tag("h1","Index").tag("p","this is Index page")
        .'<a href="/controller3/other">go to Other page</a>'
        .$end;

        return $html;
    }

    public function other(){
        global $head,$style,$body,$end;

        $html = $head.tag("title","controller3/Other").$style.$body
        .tag("h1","Other").tag("p","this is Other page")
        .$end;

        return $html;
    }


    public function __invoke(){
        return <<<EOF
            <html>
            <head>
            <title>Hello</title>
            <style>
                body{
                    font-size: 16pt;
                    color: #999;
                }
                h1{
                    font-size:30pt;
                    text-align:right;
                    margin: -15px 0px 0px 0px;
                }
            </style>
            </head>
            <body>
                <h1>Single Action</h1>
                <p>これはシングルアクションコントローラです。</p>
            </body>
            </html>
        EOF;
    }

    public function index_request_resopnse(Request $request,Response $response){
        $html = <<<EOF
        <html>
        <head>
        <title>Hello</title>
        <style>
            body{
                font-size: 16pt;
                color: #999;
            }
            h1{
                font-size:120pt;
                text-align:right;
                color:#fafafa;
                margin: -50px 0px -120px 0px;
            }
        </style>
        </head>
        <body>
            <h1>Hello</h1>
            <h3>Requset</h3>
            <pre>{$request}</pre>
            <h3>Reponse</h3>
            <pre>{$response}</pre>
        </body>
        </html>
        EOF;

        $response->setContent($html);

        return $response;
    }

    


    
    
    public function index_view(){
        return view("hello.index");
    }

    public function index_vari(){
        $data = ["msg"=>"これはコントローラから渡されたメッセージです。"];
        return view("hello.index",$data);
    }

    public function index_two_vari($id="zero"){
        $data = ["msg"=>"これはコントローラから渡されたメッセージです。","id"=>$id];
        return view("hello.index2",$data);
    }

    public function index_query(Request $request){
        $data = ["msg"=>"これはコントローラから渡されたメッセージです。","id"=>$request->id];
        
        return view("hello.index2",$data);
    }

    public function index_blade(){
        $data = ["msg"=>"これはBladeを利用したサンプルです。"];
        return view("hello.index",$data);
    }

    public function index_form(){
        //$data = ["msg"=>"お名前を入力してください。"];
        return view("hello.index",["msg"=>""]);
    }

    /*
    public function post(Request $request){
        
        return view("hello.index",["msg"=>$request->msg]);
    }
    */

    public function index_foreach(){
        $data = ["one","two","three","four","five"];
        
        return view("hello.index",["data"=>$data]);
    }

    public function index_continue_break(){
        return view("hello.index");
    }
    public function index_loop(){
        $data = ["one","two","three","four","five"];
        
        return view("hello.index",["data"=>$data]);
    }
    

    /*
    public function index(){
        return view("hello.index",["message"=>"Hello!!"]);
    }
    */

    /*
    public function index(Request $request){
        return view("hello.index",["data"=>$request->data]);
    }
    */
    /*
    public function index(Request $request){
        return view("hello.index");
    }
    */

    /*
    public function index(Request $request){
        return view("hello.index",["msg"=>"フォームを入力"]);
    }
    */

    /*
    public function post(HelloRequest $request){
        return view("hello.index",["msg"=>"正しく入力されました。"]);
    }
    */

    /*
    public function index(Request $request){

        return view("hello.index",["msg"=>"フォームを入力してください。"]);
    }
    */

    /*
    public function index(Request $request){
        
        if($request->hasCookie("msg")){
            $msg = "Cookie:".$request->cookie("msg");
        }
        else{
            $msg = "※クッキーはありません。";
        }
        return view("hello.index",["msg"=>$msg]);
    }
    */

    /*
    public function post(Request $request){
        $validate_rule = [
            "msg"=> "required"
        ];
        $this->validate($request,$validate_rule);
        $msg = $request->msg;

        $response = response()->view("hello.index",["msg"=>"「".$msg."」を保存しました。"]);

        $response->cookie("msg",$msg,100);

        return $response;
    }
    */

    /*
    public function post(HelloRequest $request){

        return view("hello.index",["msg"=>"正しく入力されました。"]);
    }
    */    

    /*
    public function index(Request $request){
        if(isset($request->id)){
            $param = ["id"=>$request->id];
            $items = DB::select("select * from people where id = :id",$param);
        }
        else{
            $items = DB::select("select * from people");
        }
        
        return view("hello.index",["items"=>$items]);
    }
    */

    /*
    public function index(Request $request){
        $items = DB::select("select * from people");
        return view("hello.index",["items"=>$items]);
    }
    */


    public function post(Request $request){
        $items = DB::select("select * from people");
        return view("hello.index",["items"=>$items]);
    }

    public function add(Request $request){
        return view("hello.add");
    }

    /*
    public function create(Request $request){
        $param = [
            "name" =>$request->name,
            "mail" =>$request->mail,
            "age" =>$request->age,
        ];
        DB::insert("insert into people (name,mail,age) values(:name,:mail,:age)",$param);
        return redirect("/hello");
    }
    */

    
    /*
    public function edit(Request $request){
        $param = ["id"=>$request->id];
        $item = DB::select("select * from people where id =:id",$param);
        return view("hello.edit",["form"=>$item[0]]);
    }
    
    public function update(Request $request){

        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update("update people set name = :name,mail = :mail,age = :age where id = :id",$param);
        return redirect("/hello");
    }
    */
    
    /*
    
    public function del(Request $request){
        $param = ["id"=>$request->id];
        $item = DB::select("select * from people where id =:id",$param);
        return view("hello.del",["form"=>$item[0]]);
    }
    public function remove(Request $request){
        $param = ["id"=>$request->id];
        DB::delete("delete from people where id = :id",$param);
        return redirect("/hello");
    }
    
    */

    /*
    public function index(Request $request){
        $items = DB::table("people")->get();
        return view("hello.index",["items"=>$items]);
    }
    */

    /*
    public function show(Request $request){
        $id = $request->id;
        $item = DB::table("people")->where("id",$id)->first();
        return view("hello.show",["item"=>$item]);
    }
    */

    /*
    public function show(Request $request){
        $id = $request->id;
        $items = DB::table("people")->where("id","<=",$id)->get();
        return view("hello.show",["items"=>$items]);
    }
    */

    /*
    public function show(Request $request){
        $name = $request->name;
        $items = DB::table("people")->where("name","like","%".$name."%")
        ->orWhere("mail","like","%".$name."%")->get();
        return view("hello.show",["items"=>$items]);
    }
    */

    /*
    public function show(Request $request){
        $name = $request->name;
        $items = DB::table("people")->where("name","like","%".$name."%")
        ->orWhere("mail","like","%".$name."%")->get();
        return view("hello.show",["items"=>$items]);
    }
    */

    /*
    public function show(Request $request){
        $min = $request->min;
        $max = $request->max;

        $items = DB::table("people")->whereRaw("age >= ? and age <= ?",[$min,$max])->get();
        return view("hello.show",["items"=>$items]);
    }
    */

    /*
    public function index(Request $request){
        $items = DB::table("people")->orderBy("age","asc")->get();
        return view("hello.index",["items"=>$items]);
    }
    */

    /*
    public function show(Request $request){
        $items = DB::table("people")->orderBy("age","asc")->get();
        return view("hello.index",["items"=>$items]);
    }
    */
    public function show(Request $request){
        $page = $request->page;
        $items = DB::table("people")->offset($page*3)->limit(3)->get();
        return view("hello.index",["items"=>$items]);
    }

    public function create(Request $request){
        $param = [
            "name"=>$request->name,
            "mail"=>$request->mail,
            "age"=>$request->age,
        ];
        DB::table("people")->insert($param);
        return redirect("/hello");
    }

    
    public function edit(Request $request){
        $item = DB::table("people")->where("id",$request->id)->first();
        return view("hello.edit",["form"=>$item]);
    }

    
    public function update(Request $request){
        $param = [
            "name"=>$request->name,
            "mail"=>$request->mail,
            "age"=>$request->age,
        ];
        DB::table("people")->where("id",$request->id)->update($param);
        return redirect("/hello");
    }
    

    public function del(Request $request){
        $param = ["id"=>$request->id];
        $item = DB::table("people")->where("id",$request->id)->first();
        return view("hello.del",["form"=>$item]);
    }
    public function remove(Request $request){

        DB::table("people")->where("id",$request->id)->delete();
        return redirect("/hello");
    }

    public function rest(Request $request){
        return view("hello.rest");
    }
    
    public function index(Request $request){
        $user = Auth::user();
        $items = Person::all();
        $param = ['items' => $items,'user' => $user];
        return view('hello.index', $param);
    }

    public function getAuth(Request $request){
        $param = ["message"=>"ログインして下さい。"];
        return view("hello.auth",$param);
    }

    public function postAuth(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(["email"=>$email,"password"=>$password])){
            $msg = "ログインしました。(".Auth::user()->name.")";
            //return view("hello.auth",["message"=>$msg]);
        }
        else{
            $msg = "ログインに失敗しました。";
        }
        return view("hello.auth",["message"=>$msg]);
    }
}


