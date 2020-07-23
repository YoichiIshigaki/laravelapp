@extends("layout.helloapp")

@section("title","Person.Edit")


@section("menubar")
    @parent
    編集ページ
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
    <form action="/person/edit" method="post">
    <table>
        @csrf
        <tr>
            <input type="hidden" name="id" value="{{$form->id}}"> 
            <th>name:</th>
            <td>
                <input type="text" name="name" value="{{$form->name}}"> 
            </td>
        </tr>
        <tr>
            <th>mail:</th>
            <td>
                <input type="text" name="mail" value="{{$form->mail}}"> 
            </td>
        </tr>
        <tr>
            <th>age:</th>
            <td>
                <input type="text" name="age" value="{{$form->age}}"> 
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