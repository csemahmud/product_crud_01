@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $product->product_name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </div>

                <figure>
                    @if ($product->product_image != NULL && $product->product_image != '')
                        <img class="product_image" 
                        src="{{ $product->upload_path }}{{ $product->product_image }}" 
                        alt="Product Image">
                        <figcaption>{{ $product->product_image }}</figcaption>
                    @else
                        <img class="product_image" src="{{URL::asset('/upload_img/no_img.jpg')}}" alt="Product Image">
                        <figcaption>No Product Image</figcaption>
                    @endif
                </figure>
                

                <div class="card-header">{{ $product->product_description }}</div>
                
                <div class="card-header">{{ $product->product_quantity }}</div>
                
                <div class="card-header">{{ $product->product_price }}</div>

                <span>Publication Status ::</span>
                @if ($product->pr_publication_status == 1)
                    <div class="alert alert-success" role="alert">
                        Published
                    </div>
                @elseif ($product->pr_publication_status == 0)
                    <div class="alert alert-danger" role="alert">
                        Unpublished
                    </div>
                @endif

                {{ link_to_route('product.index', "Back to product list") }}
            </div>
        </div>
    </div>
</div>
@endsection
