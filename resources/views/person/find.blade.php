@extends("layout.helloapp")

@section("title","Person.find")


@section("menubar")
    @parent
    検索ページ
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

    <form action="/person/find" method="post">
    @csrf
        <input type="text" name="input" value="{{$input}}">
         <input type="submit" value="find">
    </form>
    @if(isset($item))
    <table>
        <tr>
            <th>Data</th>
        </tr>
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    </table>
    @else
    <p>検索にヒットしたものはありません。</p>
    @endif
@endsection



@section("footer")
copyright 2020 yoichi
@endsection