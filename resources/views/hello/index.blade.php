@extends("layout.helloapp")

@section("title","Index")


@section("menubar")
    @parent
    インデックスページ
@endsection


@section("content")
    
    @if(Auth::check())
    <p>USER:{{$user->name."(".$user->email.")"}}</p>
    @else
    <p>ログインしていません。(<a href="/login">ログイン</a>｜<a href="/register">登録</a>)</p>
    @endif

    <style>
        th{
            background-color: #999;
            color: #fff;
            padding: 5px 10px; 
        }
        td{
            border: solid 1px #aaa;
            color: #999;
            padding: 5px 10px;
        }
    </style>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
            <th>Edit/Delete</th>
        </tr>
        @foreach($items as $item)
        
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
            <td>
                <a href="hello/edit?id={{$item->id}}" style="text-decoration:none;">編集</a> /
                <a href="hello/del?id={{$item->id}}" style="text-decoration:none;">削除</a>
            </td>
        </tr>
        
        @endforeach
    </table>
    <a href="/hello/add" style="text-decoration:none;color:white;background-color:aqua;margin-top:5px;"> 追加 </a>
    
    
@endsection








@section("footer")
copyright 2020 yoichi
@endsection