<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CustomerController extends Controller
{
    /**
     * 郵便番号から住所を取得し、JSON形式でレスポンスを返す
     */
    public function search(Request $request)
    {
        // 入力された郵便番号を取得する
        $post_code = $request->input('post_code');
        // 郵便番号検索APIを呼び出すためのURLを作成する
        $url = 'http://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $post_code;
        $method = 'GET';
        // GuzzleHttpクライアントを作成する
        $client = new Client();
        // 接続失敗時はnullを返すようにする
        try {
            // URLにアクセスした結果を変数$responseに代入
            $response = $client->request($method, $url);
            // $responseのBodyを取得
            $body = $response->getBody();
            $result = json_decode($body, true);
        } catch (\Exception $e) {
            $result = null;
        }
        dump($result);
        // レスポンスをJSON形式で返す
        return response()->json($result);
        //return view('customers.create', compact('results'));
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
