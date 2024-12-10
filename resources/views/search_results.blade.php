@extends('layouts.app')

@section('content')
    @if (isset($query))
        <h2>Resultados para "{{ $query }}"</h2>
    @endif

    @if (isset($message))
        <p>{{ $message }}</p>
    @endif

    @if(isset($products) && $products->isNotEmpty())
        @foreach ($products as $product)
            <div class="product">
                <h3>{{ $product->name }}</h3>
                <p>Precio: ${{ $product->price }}</p>
                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="200">
                <p>{{ $product->description }}</p>
            </div>
        @endforeach
    @else
        <p>No se encontraron productos. 
            <br>ESTOS SON NUESTROS PRODUCTOS RELACIONADOS</br>
        </p>
    @endif
@endsection
