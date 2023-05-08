<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CustomerController extends Controller
{
     // const HOST = 'https://<Renderアプリ名>.onrender.com/' のように、最後に / は入れない。
    const HOST = 'https://zipcloud.ibsnet.co.jp';

    public function search($zipcode)
    {
        $url = '/api/search?zipcode=' . $zipcode;
        $method = 'GET';

        // Client(接続する為のクラス)を生成
        $client = new Client();
        // 接続失敗時はnullを返すようにする
        try {
            // URLにアクセスした結果を変数$responseに代入
            $response = $client->request($method, self::HOST . $url);
            // $responseのBodyを取得
            $body = $response->getBody();
            $result = json_decode($body, true);
        } catch (\Exception $e) {
            $result = null;
        }

        return view('customers.address', compact('results'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->mail_address = $request->mail_address;
        $customer->post_code = $request->post_code;
        $customer->address = $request->address;
        $customer->telephone_number = $request->telephone_number;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->name = $request->name;
        $customer->mail_address = $request->mail_address;
        $customer->post_code = $request->post_code;
        $customer->address = $request->address;
        $customer->telephone_number = $request->telephone_number;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}