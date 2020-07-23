@extends("layout.helloapp")

@section("title","Board.Add")


@section("menubar")
    @parent
    投稿ページ
@endsection


@section("content")

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
    @if(count($errors)>0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/board/add" method="post">
    <table>
        @csrf
        <tr>
            <th>person id:</th>
            <td>
                <input type="number" name="person_id" value="{{old('person_id')}}"> 
            </td>
        </tr>
        <tr>
            <th>title:</th>
            <td>
                <input type="text" name="title" value="{{old('title')}}"> 
            </td>
        </tr>
        <tr>
            <th>message:</th>
            <td>
                <input type="text" name="message" value="{{old('message')}}"> 
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="send"> 
            </td>
        </tr>
    </table>
    </form>
@endsection



@section("footer")
copyright 2020 yoichi
@endsection