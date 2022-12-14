@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

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
                    <table>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        @foreach($productList as $product)
                            <tr>
                                <td>
                                    {{ ++$i }}
                                </td>
                                <td>
                                {{ link_to_route('product.show', $product->product_name, [$product->product_id]) }}
                                </td>
                                <td>
                                {!! Form::open(array('route' => ['product.destroy', $product->product_id], 'method' => 'DELETE')) !!}
                                    {{ link_to_route('product.edit', 'Edit', [$product->product_id], ['class' => 'brn btn-primary']) }}
                                    |
                                    {!! Form::button('Delete', ['type'=>'submit', 'class'=>'btn btn-danger']) !!} 
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                    </table>
                    {{ link_to_route('product.create', 'Add New Product', null, ['class' => 'brn btn-success']) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
