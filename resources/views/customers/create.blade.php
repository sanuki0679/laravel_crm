@extends('layouts.main')

@section('title', '顧客情報登録')

@section('content')
    <h1>顧客情報登録</h1>

    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div>
            <label for="name">顧客名:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

        </div>
        <div>
            <label for="mail_address">メールアドレス:</label>
            <input type="text" name="mail_address" id="mail_address" value="{{ old('mail_address') }}">
        </div>
        <div>
        <form action="{{ route('search') }}" method="get">
            <label for="post_code">郵便番号:</label>
            <input type="number" name="post_code" id="post_code" value="{{ old('post_code') }}">
        </div><input type="submit" value="検索">
        <div>
        
            <label for="address">住所:</label>
            <ul>
        @foreach ($result['results'] as $address)
            <li>{{ $address['address1'] }}{{ $address['address2'] }}{{ $address['address3'] }}</li>
        @endforeach
            
    </ul></form>
            <input type="text" name="address" id="address" value="{{ old('address') }}">
        </div>
        <div>
            <label for="telephone_number">電話番号:</label>
            <input type="text" name="telephone_number" id="telephone_number" value="{{ old('telephone_number') }}">
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>

    <a href="{{ route('customers.index') }}">一覧へ戻る</a>            
@endsection
