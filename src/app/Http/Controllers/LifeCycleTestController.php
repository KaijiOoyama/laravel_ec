<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceContainerTest() {
        // サービスコンテナへサービス(こんかいはクロージャ)を登録する
        app()->bind('lifeCycleTest', function() {
            return 'test';
        });

        // コンテナに登録したサービスを呼び出す
        $test = app()->make('lifeCycleTest');

        // 実例　：サービスコンテナなしの場合
        /* $message = new Message();
        $sample = new Sample($message);
        $sample->run('a'); */

        // 実例：　サービスコンテナありの場合
        app()->bind('sample', Sample::class);
        // Sampleクラスが依存しているMessageクラスとの依存関係を解決してよびだしてくれる
        $sample = app()->make('sample');
        $sample->run('テストです');

        // 呼び出したサービスの結果とサービスコンテナの一覧を表示
        dd($test, app());
    }
}

class Sample {
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function run ($message) {
        $this->message->send($message);
    }
}

class Message {
    public function send($message) {
        echo $message;
    }
}
