@extends('layouts.main')

@section('title', '郵便番号検索')

@section('content')
    <h1>郵便番号検索</h1>
    @csrf
    <form action="{{ route('search') }}" method="GET">
        <div class="form-group">
            <label for="post_code">郵便番号</label>
            <input type="number" class="form-control" name="post_code" id="post_code" placeholder="郵便番号を入力してください">

            <button type="submit" class="btn btn-primary">検索</button>
        </div>
    </form>
    <a href="{{ route('customers.index') }}" class="btn">一覧画面</a>

@endsection
