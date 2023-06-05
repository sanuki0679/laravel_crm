@extends('layouts.main')

@section('title', '顧客情報登録')

@section('content')
    <h1>顧客情報登録</h1>

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
    
    <form action="{{ route('customers.store') }}" method="post">
    @csrf
        <ul>
            @foreach ($result['results'] as $address)
                @foreach ($result['results'] as $zipcode)
                @endforeach
            @endforeach
        </ul>
        <div>
            <label for="name">顧客名:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">

        </div>
        <div>
            <label for="mail_address">メールアドレス:</label>
            <input type="text" name="mail_address" id="mail_address" value="{{ old('mail_address') }}">
        </div>
        <div>

            <label for="post_code">郵便番号:</label>
            
            <input type="number" name="post_code" id="post_code" value="{{ $zipcode['zipcode'] }}">
            
        </div>
        <div>

            <label for="address">住所:</label>
            <input type="text" name="address" id="address" value="{{ $address['address1'] }}{{ $address['address2'] }}{{ $address['address3'] }}">
            
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
