@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Create Product
                    {!! Form::open(array('url' => '/product/store','method'=>'POST', 'files'=>true)) !!}
                        <div class="form-group">
                            {!! Form::label('product_name', 'Enter Product Name :: ') !!}
                            {!! Form::text('product_name', null, ['class'=>'form-control']) !!}
                        </div>

                        {!! csrf_field() !!}

                        <div class="form-group">
                            {!! Form::label('product_image', 'Product Image :: ') !!}
                            {!! Form::file('product_image', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('product_description', 'Enter Description :: ') !!}
                            {!! Form::textarea('product_description', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('product_quantity', 'Enter Quantity :: ') !!}
                            {!! Form::text('product_quantity', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('product_price', 'Enter Price :: ') !!}
                            {!! Form::text('product_price', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('pr_publication_status', 'Select Publiction Status :: ') !!}
                            {!! Form::radio('pr_publication_status', 1, true) !!}
                            {!! Form::label('pr_publication_status', 'Published') !!}
                            {!! Form::radio('pr_publication_status', 0) !!}
                            {!! Form::label('pr_publication_status', 'Unpublished') !!}
                        </div>

                        <div class="form-group">
                        {!! Form::button('Create', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif


                    {{ link_to_route('product.index', "Back to product list") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
