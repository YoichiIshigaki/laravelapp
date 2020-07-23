@extends("layout.helloapp")

@section("title","Person.Delete")


@section("menubar")
    @parent
    削除ページ
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
    <form action="/person/del" method="post">
    <table>
        @csrf
        <tr>
            <input type="hidden" name="id" value="{{$form->id}}"> 
            <th>name:</th>
            <td>{{$form->name}}</td>
        </tr>
        <tr>
            <th>mail:</th>
            <td>{{$form->mail}}</td>
        </tr>
        <tr>
            <th>age:</th>
            <td>{{$form->age}} </td>
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