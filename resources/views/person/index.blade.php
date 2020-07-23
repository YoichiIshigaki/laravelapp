@extends("layout.helloapp")

@section("title","Person.index")


@section("menubar")
    @parent
    インデックスページ
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

    <table>
        <tr>
            <th>Person</th>
            <th>Board</th>
        </tr>
        @foreach($hasItems as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
                <table width="100%">    
                    @foreach($item->boards as $obj)
                        <tr><td>{{$obj->getData()}}</td></tr>
                    @endforeach
                </table>
            </td>
        </tr>
        @endforeach
    </table>
    <div style="margin:10px"></div>
    <table>
        <tr><th>Person</th></tr>
        @foreach($noItems as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
        @endforeach
    </table>
    
@endsection








@section("footer")
copyright 2020 yoichi
@endsection