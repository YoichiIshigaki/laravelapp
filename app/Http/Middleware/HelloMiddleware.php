<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
        $data = [
            ["name"=>"山田たろう","mail"=>"taro@yamada"],
            ["name"=>"山田はなこ","mail"=>"hanako@flower"],
            ["name"=>"鈴木さちこ","mail"=>"sachiko@happy"]
        ];
        $request->merge(["data"=>$data]);
        return $next($request);
        */
        /*
        $response = $next($request);
        $content = $response->content();

        $pattern = "/<middleware>(.*)<\/middleware>/i";
        $replace = "<a href='http://$1'>$1</a>";
        $content = preg_replace($pattern,$replace,$content);
        $response->setContent($content);
        return $response;
        */
    }
}
