@extends('layouts.main')

@section('title', '顧客情報一覧')

@section('content')
    <h1>顧客情報一覧</h1>
    
    <ul>
        @foreach ($customers as $customer)
            <li><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('customers.create') }}">create</a>
@endsection
