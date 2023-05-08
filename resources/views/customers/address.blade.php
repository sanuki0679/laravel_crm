@extends('layouts.main')

@section('title', '郵便番号検索')

@section('content')
    <h1>郵便番号検索</h1>
    
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('customers.show', $customer) }}">{{ $customer->name }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('customers.create') }}">create</a>
@endsection
