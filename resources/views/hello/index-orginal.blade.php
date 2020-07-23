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
            color: #f6f6f6;
            margin:-20px 0px -30px 0px;
            letter-spacing: -4pt;
        }
    </style>
</head>
<body>
    <h1>Index/Blade</h1>

    <ol>
    <p>&#064;whileディレクティブの例</p>
    @php
        $counter = 0;
    @endphp

    @while($counter < count($data))
        <li>{{$data[$counter]}}</li>
        @php
            $counter++;
        @endphp
    @endwhile
    </ol>

    
</body>

</html>