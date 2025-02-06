@extends('layouts.app')

@section('title', '更新商品')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>更新商品</h1>

            @include('layouts._form_errors')

            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">商品名称：</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入商品名称"
                           value="{{ $product->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">商品价格：</label>
                    <input type="number" class="form-control" id="price" name="price"
                           value="{{ $product->price }}" placeholder="请输入商品价格" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">商品图片：</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="current_image" class="form-label">当前图片：</label>
                    <img id="current_image" src="{{ $product->image }}" class="img-thumbnail"
                         alt="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">商品描述：</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                              required>{{ $product->description }}</textarea>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="更新商品信息">
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
