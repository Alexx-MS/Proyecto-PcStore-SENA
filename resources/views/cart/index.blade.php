@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrito de Compras</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (count($cartItems) > 0)
        <div class="cart-grid">
            @foreach ($cartItems as $productId => $item)
                <div class="product-card">
                    <!-- Imagen del producto -->
                    <div class="product-image">
    @if (isset($item['image']))
        

        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
    @else
        <p>Imagen no encontrada</p>
        <img src="{{ asset('images/no-image.png') }}" alt="Imagen no disponible">
    @endif
</div>


                    <div class="product-info">
                        <!-- Nombre del producto -->
                        <h3 class="product-name">{{ $item['name'] }}</h3>
                        <!-- Cantidad -->
                        <p class="product-description">Cantidad: {{ $item['quantity'] }}</p>
                        <!-- Precio unitario -->
                        <p class="product-price">Precio unitario: ${{ number_format($item['price'], 2) }}</p>
                        <!-- Total -->
                        <p class="product-price">Total: ${{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                        <!-- Botón de eliminar -->
                        <form action="{{ route('cart.remove', $productId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="product-link delete-btn">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="cart-total">
            <h3>Total: ${{ number_format($totalAmount, 2) }}</h3>
            <a href="https://paypal.me/camilitobb1342?country.x=CO&locale.x=es_XC" style="text-decoration: none; color: inherit;">
  <div class="container2">
    <div class="left-side">
      <div class="card">
        <div class="card-line"></div>
        <div class="buttons"></div>
      </div>
      <div class="post">
        <div class="post-line"></div>
        <div class="screen">
          <div class="dollar">$</div>
        </div>
        <div class="numbers"></div>
        <div class="numbers-line2"></div>
      </div>
    </div>
    <div class="right-side">
      <div class="new">Pagar con Paypal</div>
    </div>
  </div>
</a>

</div>
        </div>
    @else
        <p class="no-products">No hay productos en el carrito.</p>
    @endif
</div>

<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #fff;
    }

    .cart-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .product-card {
        background-color: #1a1a1a;
        border: 1px solid #333;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
    }

    .product-image {
        width: 100%;
        height: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #222;
    }

    .product-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .product-info {
        padding: 15px;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin: 0 0 10px;
    }

    .product-description {
        font-size: 14px;
        color: #bbb;
        margin: 0 0 10px;
    }

    .product-price {
        font-size: 16px;
        font-weight: bold;
        color: #ff5722;
        margin: 0 0 10px;
    }

    .product-link {
        display: inline-block;
        background-color: #ff5722;
        color: #fff;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
    }

    .product-link:hover {
        background-color: #e64a19;
    }

    .delete-btn {
        background-color: #dc3545;
        margin-top: 10px;
    }

    .delete-btn:hover {
        background-color: #c82333;
    }

    .cart-total {
        text-align: center;
        margin-top: 20px;
    }

    .checkout-btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
    }

    .checkout-btn:hover {
        background-color: #0056b3;
    }

    .no-products {
        text-align: center;
        color: #bbb;
    }
    /* From Uiverse.io by Admin12121 */ 

.container2 {
  background-color: black;
  display: flex;
  width: 270px;
  height: 120px;
  position: relative;
  border-radius: 6px;
  transition: 0.3s ease-in-out;
}

.container2:hover {
  transform: scale(1.03);
}

.container2:hover .left-side {
  width: 100%;
}

.left-side {
  background-color: #790000;
  width: 130px;
  height: 120px;
  border-radius: 4px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: 0.3s;
  flex-shrink: 0;
  overflow: hidden;
}

.right-side {
  display: flex;
  align-items: center;
  cursor: pointer;
  justify-content: space-between;
  white-space: nowrap;
  transition: 0.3s;
}

.right-side:hover {
  background-color: #f9f7f9;
}

.arrow {
  width: 20px;
  height: 20px;
  margin-right: 20px;
}

.new {
  font-size: 23px;
  font-family: "Lexend Deca", sans-serif;
  margin-left: 20px;
}

.card {
  width: 70px;
  height: 46px;
  background-color: #c7ffbc;
  border-radius: 6px;
  position: absolute;
  display: flex;
  z-index: 10;
  flex-direction: column;
  align-items: center;
  -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
  -moz-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
  -webkit-box-shadow: 9px 9px 9px -2px rgba(77, 200, 143, 0.72);
}

.card-line {
  width: 65px;
  height: 13px;
  background-color: #80ea69;
  border-radius: 2px;
  margin-top: 7px;
}

@media only screen and (max-width: 480px) {
  .container2 {
    transform: scale(0.7);
  }

  .container2:hover {
    transform: scale(0.74);
  }

  .new {
    font-size: 18px;
  }
}

.buttons {
  width: 8px;
  height: 8px;
  background-color: #379e1f;
  box-shadow: 0 -10px 0 0 #26850e, 0 10px 0 0 #56be3e;
  border-radius: 50%;
  margin-top: 5px;
  transform: rotate(90deg);
  margin: 10px 0 0 -30px;
}

.container2:hover .card {
  animation: slide-top 1.2s cubic-bezier(0.645, 0.045, 0.355, 1) both;
}

.container2:hover .post {
  animation: slide-post 1s cubic-bezier(0.165, 0.84, 0.44, 1) both;
}

@keyframes slide-top {
  0% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }

  50% {
    -webkit-transform: translateY(-70px) rotate(90deg);
    transform: translateY(-70px) rotate(90deg);
  }

  60% {
    -webkit-transform: translateY(-70px) rotate(90deg);
    transform: translateY(-70px) rotate(90deg);
  }

  100% {
    -webkit-transform: translateY(-8px) rotate(90deg);
    transform: translateY(-8px) rotate(90deg);
  }
}

.post {
  width: 63px;
  height: 75px;
  background-color: #dddde0;
  position: absolute;
  z-index: 11;
  bottom: 10px;
  top: 120px;
  border-radius: 6px;
  overflow: hidden;
}

.post-line {
  width: 47px;
  height: 9px;
  background-color: #545354;
  position: absolute;
  border-radius: 0px 0px 3px 3px;
  right: 8px;
  top: 8px;
}

.post-line:before {
  content: "";
  position: absolute;
  width: 47px;
  height: 9px;
  background-color: #757375;
  top: -8px;
}

.screen {
  width: 47px;
  height: 23px;
  background-color: #ffffff;
  position: absolute;
  top: 22px;
  right: 8px;
  border-radius: 3px;
}

.numbers {
  width: 12px;
  height: 12px;
  background-color: #838183;
  box-shadow: 0 -18px 0 0 #838183, 0 18px 0 0 #838183;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 52px;
}

.numbers-line2 {
  width: 12px;
  height: 12px;
  background-color: #aaa9ab;
  box-shadow: 0 -18px 0 0 #aaa9ab, 0 18px 0 0 #aaa9ab;
  border-radius: 2px;
  position: absolute;
  transform: rotate(90deg);
  left: 25px;
  top: 68px;
}

@keyframes slide-post {
  50% {
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }

  100% {
    -webkit-transform: translateY(-70px);
    transform: translateY(-70px);
  }
}

.dollar {
  position: absolute;
  font-size: 16px;
  font-family: "Lexend Deca", sans-serif;
  width: 100%;
  left: 0;
  top: 0;
  color: #4b953b;
  text-align: center;
}

.container:hover .dollar {
  animation: fade-in-fwd 0.3s 1s backwards;
}

@keyframes fade-in-fwd {
  0% {
    opacity: 0;
    transform: translateY(-5px);
  }

  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>
@endsection