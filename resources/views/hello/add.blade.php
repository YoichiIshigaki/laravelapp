@extends('layout.helloapp')

@section('title', 'Add')

@section('menubar')
   @parent
   新規作成ページ
@endsection

@section('content') 
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
    <form action="/hello/add" method="post">
    <table>
    @csrf
        <tr>
            <th>name: </th>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <th>mail: </th>
            <td>
                <input type="text" name="mail">
            </td>
        </tr>
        <tr>
            <th>age: </th>
            <td>
                <input type="text" name="age">
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

@section('footer')
copyright 2020 yoichi.
@endsection