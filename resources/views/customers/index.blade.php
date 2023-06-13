@extends('layouts.main')

@section('title', '顧客情報一覧')

@section('content')
    <h1>顧客情報一覧</h1>
    <table>
        <thead>
            <tr>
                <th>顧客ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
                <th>電話番号</th>
            </tr>
        </thead>
        @foreach ($customers as $customer)
            <tr>
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->mail_address }}</td>
                <td>{{ $customer->post_code }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->telephone_number }}</td><br>
            </tr>
        @endforeach
    </table>
    <button onclick="location.href='{{ route('customers.create') }}'">新規作成</button>
    
@endsection
