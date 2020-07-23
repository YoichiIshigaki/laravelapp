@extends("layout.helloapp")

@section("title","Board.index")


@section("menubar")
    @parent
    ボード・ページ
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
            <th>Message</th>
            <th>Name</th>
        </tr>
        @foreach($items as $item)
        
        <tr>
            <td>{{$item->message}}</td>
            <td>{{$item->person->name}}</td>
        </tr>
        </a>
        @endforeach
    </table>
    
    
@endsection



@section("footer")
copyright 2020 yoichi
@endsection