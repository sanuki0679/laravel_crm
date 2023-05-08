@extends('layouts.main')

@section('title', '顧客情報')

@section('content')
    <h1>顧客情報</h1>

    <form>
        <div>
            <label for="name">顧客名:</label>
            <input type="text" name="name" id="name" value="{{ $customer->name }}" readonly>

        </div>
        <div>
            <label for="mail_address">メールアドレス:</label>
            <input type="text" name="mail_address" id="mail_address" value="{{ $customer->mail_address }}" readonly>
        </div>
        <div>
            <label for="post_code">郵便番号:</label>
            <input type="number" name="post_code" id="post_code" value="{{ $customer->post_code }}" readonly>
        </div>
        <div>
            <label for="address">住所:</label>
            <input type="text" name="address" id="address" value="{{ $customer->address }}" readonly>
        </div>
        <div>
            <label for="telephone_number">電話番号:</label>
            <input type="text" name="telephone_number" id="telephone_number" value="{{ $customer->telephone_number }}"
                readonly>
        </div>
    </form>

    <a href="{{ route('customers.index') }}">一覧画面</a>
    <a href="{{ route('customers.edit', $customer) }}">編集</a>
    <form action="{{ route('customers.destroy', $customer) }}" method="post" name="form1" style="display: inline">
        @csrf
        @method('delete')
        <button type="submit" onclick="if(!confirm('削除していいですか？')){return false}">削除する</button>

    </form>
@endsection
