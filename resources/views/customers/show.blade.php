@extends('layouts.main')

@section('title', '顧客情報')

@section('content')
    <h1>顧客情報</h1>
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
            <tr>
                <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->mail_address }}</td>
                <td>{{ $customer->post_code }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->telephone_number }}</td><br>
            </tr>
    </table>
    <button onclick="location.href='{{ route('customers.edit', $customer) }}'">編集</button><br>
    <form action="{{ route('customers.destroy', $customer) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか？')){return false}">削除する</button>
    </form><br>
    <button onclick="location.href='{{ route('customers.index') }}'">一覧画面</button>
    
@endsection
