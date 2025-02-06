@extends('layouts.app')

@section('title', '商品列表')

@section('content')
    @foreach($products as $index => $product)
        @if($index % 3 === 0)
            @if($index !== 0) </div> @endif <!-- 每当 index 不等于 0 时, 结束上一个 row -->
<div class="row g-3 mt-1"> <!-- 每 3 个产品开启新的一行 -->
    @endif
    <div class="col-md-4">
        <div class="card">
            <img src="{{ $product->image }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">价格: {{ $product->price }}</p>
                <p class="card-text">
                    描述: {{ mb_substr($product->description, 0, 20, 'UTF-8') . "..." }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">查看详情</a>
            </div> <!-- 结束 card-body -->
        </div> <!-- 结束 card -->
    </div> <!-- 结束 col-md-4 -->
    @endforeach
</div> <!-- 结束 row -->
@endsection
