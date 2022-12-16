@extends('layout.app')

@include('layout.head', ['title' => 'Home'])

<style>
    .flower-types {
        padding: 0 0px 20px 25px;
    }

    .flower-organize {
        width: 100%;
        display: flex;
        align-content: center;
        justify-content: space-between;
        margin: 50px 0 0 0;
        padding: 0 25px 0 25px;
    }

    .flowers-grid {
        width: 100%;
        padding: 10px 70px 10px 70px;
    }

    .filtter {
        display: flex;
        align-content: center;
        cursor: pointer;
    }

    .add-to-cart {
        width: 100% !important;
    }
</style>


@section('content')
    <div class="row " style="{{ session()->get('errormessage') == '' ? 'display:none;' : '' }}">
        <div class="col offset-s3 s6">
            <div class="card red lighten-5">
                <h5 class="center card-content red-text" style="text-transform: uppercase;">
                    {{ session()->get('errormessage') }}</h5>
            </div>
        </div>
    </div>
    <div class="row " style="{{ session()->get('successmessage') == '' ? 'display:none;' : '' }}">
        <div class="col offset-s3 s6">
            <div class="card green lighten-5">
                <h5 class="center card-content green-text" style="text-transform: uppercase;">
                    {{ session()->get('successmessage') }}</h5>
            </div>
        </div>
    </div>
    @error('user_email')
        <div class="row ">
            <div class="col offset-s3 s6">
                <div class="card red lighten-5">
                    <h5 class="center card-content red-text" style="text-transform: uppercase;">
                        Please sign in OR sign up IN order to complete this action</h5>
                </div>
            </div>
        </div>
    @enderror



    <div class="container center row " style="height: 400px; display:flex; flex-direction:column; justify-content:center;">
        <img src="/image/flower.png" class="col s6 s12" alt="flower">
        <p class="flow-text">"Flowers always make people better, happier, and more helpful they are sunshine, food and
            medicine for the soul" </p>
        <div class="divider pink"></div>
    </div>

    <div class="flower-organize">

        <div class="flower-types">
            <a href="/flowers" class="btn-flat {{ request()->is('flowers') ? 'pink-text' : '' }}">All</a>
            <a href="/flowers/cactuses"
                class="btn-flat {{ request()->is('flowers/cactuses') ? 'pink-text' : '' }}">CACTUSES</a>
            <a href="/flowers/exotic" class="btn-flat {{ request()->is('flowers/exotic') ? 'pink-text' : '' }}">EXOTIC</a>
            <a href="/flowers/greens" class="btn-flat {{ request()->is('flowers/greens') ? 'pink-text' : '' }}">GREENS</a>
            <a href="/flowers/various"
                class="btn-flat {{ request()->is('flowers/various') ? 'pink-text' : '' }}">VARIOUS</a>
            <a href="/flowers/winter" class="btn-flat {{ request()->is('flowers/winter') ? 'pink-text' : '' }}">WINTER</a>
        </div>
    </div>

    <!-- flowers cards -->

    <div class="row center flowers-grid">
        @if (session()->get('adminemail') != null)
            <div>
                <a href="{{ route('flowers.create') }}" class="waves-effect waves-light btn pink">add flower<i class="material-icons right">add</i></a>
            </div>
        @endif
        @empty($flowers[0])
            <h4>Flowers not avilable</h4>
        @endempty

        @foreach ($flowers as $flower)
            <!-- card -->
            <div class="col s4 m3" style="width: 250px">
                <div class="card horizontal " style="margin-bottom: 50px;  margin-top: 20px;">
                    <a href="{{ route('flowers.show', $flower['flowers_id']) }}" class="black-text">
                        <div class="card-image">
                            <img src="{{ $flower['image_url'] }}" width="100%" height="200">
                        </div>
                        <div class="divider"></div>
                        <p style="font-size: 20px; ">{{ $flower['name'] }}</p>
                        <h6 style="padding-bottom: 10px;">{{ $flower['price'] }}$</h6>
                    </a>
                    <form action="{{ route('carts.store') }}" method="POST">
                        @csrf
                        <input hidden name="flower_id" value="{{ $flower['flowers_id'] }}">
                        <input hidden name="user_email" value="{{ session()->get('user_email') != null ? session()->get('user_email') : session()->get('adminemail') }}">
                        <input hidden name="quantity" type="number" value="1">
                        <input class="btn pink add-to-cart" type="submit" value="Add to cart">
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
