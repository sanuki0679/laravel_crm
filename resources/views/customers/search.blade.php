@extends('layouts.main')

@section('title', '郵便番号検索')

@section('content')
    <h1>郵便番号検索</h1>
    <ul>
        @foreach ($result['results'] as $address)
            <li>{{ $address['address1'] }}{{ $address['address2'] }}{{ $address['address3'] }}</li>
        @endforeach
    </ul>


@endsection
