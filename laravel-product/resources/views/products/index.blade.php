@extends('layouts.app')

@section('title', '商品列表')

@section('content')

    <div class="row g-3 mt-1 mb-3">
        @foreach($products as $index => $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">价格: {{ $product->price }}</p>
                        <p class="card-text">
                            描述: {{ mb_substr($product->description, 0, 20, 'UTF-8') . "..." }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">查看详情</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- 分页链接 --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
@endsection
