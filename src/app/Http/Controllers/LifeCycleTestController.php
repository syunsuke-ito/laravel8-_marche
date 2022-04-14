<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{


    public function showServiceProviderTest()
    {
        $encrvpt = app()->make('encrypter');
        $password = $encrvpt->encrypt('password');

        $sample = app()->make('serviceProviderTest');
        dd($sample, $password, $encrvpt->decrypt($password));
    }
    public function showServiceContainerTest()
    {

        $test = app()->make('lifeCycleTest');

        //サービスコンテナなしのパターン
        // $message = new Message();
        // $sample = new Sample($message);
        // $sample->run();

        //サービスコンテナを使うパターン
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        dd($test, app());
    }

}

class Sample
{
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function run()
    {
        $this->message->send();
    }
}

class Message
{
    public function send()
    {
        echo ('メッセージを表示');
    }
}
