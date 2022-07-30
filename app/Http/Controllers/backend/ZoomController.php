<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Traits\ZoomJWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\models\Zoom;
use App\models\ZoomSupport;
use Illuminate\Support\Facades\Http;
use App\models\Course;


class ZoomController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function getList(Request $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        $data['meetings'] = array_map(function (&$m) {
            $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
            return $m;
        }, $data['meetings']);
        $x = $data['meetings'];

        // dd($x);
        // return [
        //     'success' => $response->ok(),
        //     'data' => $data,
        // ];



    }
    public function getZoom()
    {
        $zoom = Zoom::query()->get();
        return view('pages.backend.zoom.main', compact('zoom'));
    }
    public function getZoomSupport(){
        $zoomsupport = ZoomSupport::query()->get();
        return view('pages.backend.zoom.mainsupport',compact('zoomsupport'));
    }

    public function getCreate()
    {
        return view('pages.backend.zoom.create');
    }

    public function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = json_decode($this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => 30,

            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => false,
            ]
        ])->body(), true);
        $zoom = Zoom::create([
            'id' => $response['id'],
            'topic' => $response['topic'],
            'type' => $response['type'],
            'join_url' => $response['join_url'],
            'start_time' => $response['start_time'],
        ]); // add $data here


        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
        // dd($zoom);
        // return redirect('/');

        // Http::post('https://discord.com/api/webhooks/867285596090007554/HSyaCb-3GZxjjqZ7ox3wNwcfFBlJ2v9i_BBVriSvMsoXOy9WRLLMNWq172YzVgFoTHJl', [
        //     'content' => "Có học sinh cần hỗ trợ ",
        //     'embeds' => [
        //         [
        //             'title' => "{$request->topic}",
        //             'url' => $response['join_url'],
        //             'description' => "{$request->type}",
        //             'color' => '7506394',
        //             'author' => [
        //                 'name'=> "{$request->id}",
        //             ]
        //         ]
        //     ],
        // ]);
        return redirect()->route('zoom.main');
    }
    public function postCreatesupport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = json_decode($this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => 30,

            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => false,
            ]
        ])->body(),true);

            $zoomsupport = Zoom::create([

                'id' => $response['id'],
                'topic' => $response['topic'],
                // 'class' => $request->class,
                'type' => $response['type'],
                'join_url' => $response['join_url'],
                'start_time' => $response['start_time'],
            ]); // add $data here

            $zoomsupport->save();


        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
        // dd($zoom);


         Http::post('https://discord.com/api/webhooks/867285596090007554/HSyaCb-3GZxjjqZ7ox3wNwcfFBlJ2v9i_BBVriSvMsoXOy9WRLLMNWq172YzVgFoTHJl', [
            'content' => "Học sinh {$request->topic} có yêu cầu hỗ trợ",
            'embeds' => [
                [
                    'title' => "Vào trợ giúp ngay nào",
                    'url' => $response['join_url'],
                    'description' => "Lớp: {$request->class}",
                    'color' => '7506394',
                    'footer' => [
                        'text'=>'Được gửi từ hệ thống',
                    ],
                    "timestamp" => $response['start_time'],
                ]
            ],
        ]);
        return redirect($response['join_url']);
    }
    public function get(Request $request, string $id)
    {
        $path = 'meetings/' . $id;
        $response = $this->zoomGet($path);

        $data = json_decode($response->body(), true);
        if ($response->ok()) {
            $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        }

        // return [
        //     'success' => $response->ok(),
        //     'data' => $data,
        // ];
        dd($data);
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $id;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => 30,

            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        return [
            'success' => $response->status() === 204,
            'data' => json_decode($response->body(), true),
        ];
    }
    public function delete(Request $request, string $id)
    {
        $zoom = Zoom::find($id)->delete();
        $path = 'meetings/' . $id;
        $response = $this->zoomDelete($path);

        // return [
        //     'success' => $response->status() === 204,
        //     'data' => json_decode($response->body(), true),
        // ];
        return redirect('api/zoom');
    }
    public function deleteSupport(Request $request, string $id)
    {
        $zoomsupport = ZoomSupport::find($id)->delete();
        $path = 'meetingsupport/' . $id;
        $response = $this->zoomDelete($path);

        // return [
        //     'success' => $response->status() === 204,
        //     'data' => json_decode($response->body(), true),
        // ];
        return redirect('api/zoomsupport');
    }
}
