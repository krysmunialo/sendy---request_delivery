<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Request;
use Cornford\Googlmapper\Facades\MapperFacade;
use \GuzzleHttp\Client;
use \GuzzleHttp\Middleware;
//use Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
         // $orders = Order::all();
         // $orders = Order::latest()->get();
         $orders = Order::latest('created_at')->get();
        return view('orders.index', compact('orders')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.new');
    }


    public function toApi(Request $request)

    { 
    $client = new \GuzzleHttp\Client();  
        $input = $request::all();
        $command = 'request';
        $api_key = 'MjuhMtfAAfvJqzbnWFLA';
        // $api_key = 'mysendykey';
        $api_username = 'chris-stop';
        // $api_username = 'mysendyusername';
        $from_name = 'Chris Munialo';
        $from_lat= $input['lat'];
        $from_long=$input['lng'];
        $from_description = '';
        $to_name = 'TRM';
        $to_lat = $input['lat1'];
        $to_long = $input['lng1'];
        $to_description = '';
        $recepient_name = 'John';
        $recepient_phone = '0710000000';
        $recepient_email = 'John@doe.com';
        $pick_up_date = '2016-04-20 12:12:12';
        $status = false;
        $pay_method = 0;
        $amount = 10;
        $return = true;
        $note ='Sample note';
        $note_status= true;
        $request_type = 'quote';
        $info = [
            'command' => $command,
            'data' => [
                'api_key' => $api_key,
                'api_username' => $api_username,
                'from' => [
                    'from_name' => $from_name,
                    'from_lat' => floatval($from_lat),
                    'from_long' => floatval($from_long),
                    'from_description' => $from_description
                ],
                'to' => [
                    'to_name' => $to_name,
                    'to_lat' => floatval($to_lat),
                    'to_long' => floatval($to_long),
                    'to_description' => $to_description
                ],
                'recepient' => [
                    'recepient_name' => $recepient_name,
                    'recepient_phone' => $recepient_phone,
                    'recepient_email' => $recepient_email
                ],
                'delivery_details' => [
                    'pick_up_date' => $pick_up_date,
                    'collect_payment' => [
                        'status' => $status,
                        'pay_method' => $pay_method,
                        'amount' => $amount
                    ],
                    'return' => $return,
                    'note' => $note,
                    'note_status' => $note_status,
                    'request_type' => $request_type
                ]
            ]
        ];
        $clientHandler = $client->getConfig('handler');
        // Create a middleware that echoes parts of the request.
        $tapMiddleware = Middleware::tap(function ($request) {
            $request->getHeader('Content-Type');
        // application/json
            $request->getBody();
        // {"foo":"bar"}
        });
        $endpoint = 'https://developer.sendyit.com/v1/api/#request';
        // $info = json_encode($info);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $endpoint,
            ['json' => $info,
              'handler' => $tapMiddleware($clientHandler),
              'headers' => [
                'Accept' => 'application/json'
                ]

            ]);
   
        // $res->getStatusCode();
        // "200"
        // $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        $pns = json_decode($res->getBody(), true);
        // var_dump($pns);
        // echo $pns;
        // echo $pns;
        // $pns= $res->getBody();
        // {"type":"User"...

        // Send an asynchronous request.
        // $request = new \GuzzleHttp\Psr7\Request('POST', $endpoint );
        // $promise = $client->sendAsync($request)->then(function ($response) {
            // $response->getBody();
        // });
        // $promise->wait();
        return view('orders.new', ['pns' => $pns]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // $input = Request::all();
        $input = new Order( $request->all());
        Auth::user()->orders()->save($input);
        // return $input;
        // Order::create($input);
        return redirect('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        // return $id;
        // dd($order);
        return view('orders.specific', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
