<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function test(){

        $client = new Client(
                    array(
                        'base_uri' => 'http://www.wqketang.cc',
                        'timeout' => '2.0',
                        'headers'=>array('wqId' => 'teepcloud','X-Auth-Token'=>'n8loeiyxrv4c0044sg4k0ggkogko8o'))
                );

        //测试get
        //$response = $client->request('GET', '/api/group/list',array('query'=>array('issueId'=>1)));
        //$code = $response->getStatusCode(); // 200
        //$reason = $response->getReasonPhrase(); // OK

        //测试post
        $response = $client->request('POST', '/api/report/teacher/add', [
            'form_params' => [
                'userIds' => '199384',
                'groupId' => '2'
            ]
        ]);
        $content = $response->getBody()->getContents();

        return json_decode($content,true);
    }
}
