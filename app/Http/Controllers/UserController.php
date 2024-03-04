<?php

namespace App\Http\Controllers;


use Illuminate\Http\Client\Factory;
use Illuminate\Http\Request;
use Storipress\WordPress\WordPress;

class UserController extends Controller
{
    public function auth(Request $request)
    {
        // 创建 HTTP 客户端实例
        $httpClient = new Factory();

        // 创建 WordPress 类实例
        $wordpress = new WordPress($httpClient);
        $wordpress->setUrl("https://xxx.cn");
        $wordpress->setUsername("xx");
        $wordpress->setPassword("xxx");
        $wordpress->prettyUrl();
        dump($wordpress);

        $userList = $wordpress->user()->list();
        dump($userList);

        $post = [
            "data" => "2024-03-04T18:19:44",
            "status" => "pending",
            "password" => "",
            "title" => "标题 1",
            "context" => "内容 1",
            "author" => 1,
            "format" => "standard"
        ];
        $createPost = $wordpress->post()->create($post);
        dump($createPost);
    }
}
