@extends('layouts.app')

@section('title', '商品详情')

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-thumbnail" alt="{{ $product->name }}">
            <h2>{{ $product->name }}</h2>
            <p><strong>价格:</strong> {{ $product->price }}</p>
            <p><strong>商品描述:</strong> {{ $product->description }}</p>
            <p><strong>创建时间:</strong> {{ $product->created_at }}</p>
            <p><strong>更新时间:</strong> {{ $product->updated_at }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">返回列表</a>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">编辑</a>
            <a href="javascript:void(0);" class="btn btn-danger"
               data-bs-toggle="modal" data-bs-target="#exampleModal">删除</a>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">删除商品确认</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    数据删除后无法恢复, 你确定要删除吗?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
