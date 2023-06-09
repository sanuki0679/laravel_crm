@extends('layouts.main')

@section('title', '顧客情報修正')

@section('content')
    <h1>顧客情報修正</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    

    <form action="{{ route('customers.update',$customer) }}" method="post">
        @csrf
        @method('patch')
        <div>
            <label for="name">顧客名:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}">

        </div>
        <div>
            <label for="mail_address">メールアドレス:</label>
            <input type="text" name="mail_address" id="mail_address" value="{{ old('mail_address', $customer->mail_address) }}">
        </div>
        <div>
            <label for="post_code">郵便番号:</label>
            <input type="number" name="post_code" id="post_code" value="{{ old('post_code', $customer->post_code) }}">
        </div>
        <div>
            <label for="address">住所:</label>
            <textarea name="address" id="address" rows="3">{{ old('address', $customer->address) }}</textarea>
            
        </div>
        <div>
            <label for="telephone_number">電話番号:</label>
            <input type="text" name="telephone_number" id="telephone_number" value="{{ old('telephone_number', $customer->telephone_number) }}">
        </div>
        <div>
            <input type="submit" value="修正">
        </div>
    </form>

    <a href="{{ route('customers.show', $customer) }}" class="btn">詳細へ戻る</a>
@endsection
