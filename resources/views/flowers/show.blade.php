@extends('layout.app')


@include('layout.head', ['title' => 'Cart'])
<style>
    .height {
        width: 100%;
        height: 800px;
        padding-top: 40px;
    }

    .infos {
        height: 50%;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: space-around;
    }

    .details {
        text-align: start;
        width: 500px;
    }
</style>
@section('content')
    <div id="message" class="row " style="{{ session()->get('errormessage') == '' ? 'display:none;' : 'display:block;' }}">
        <div class="col offset-s3 s6">
            <div class="card red lighten-5">
                <h5 class="center card-content red-text" style="text-transform: uppercase;">
                    {{ session()->get('errormessage') }}</h5>
            </div>
        </div>
    </div>
    <div id="message" class="row "
        style="{{ session()->get('successmessage') == '' ? 'display:none;' : 'display:block;' }}">
        <div class="col offset-s3 s6">
            <div class="card green lighten-5">
                <h5 class="center card-content green-text" style="text-transform: uppercase;">
                    {{ session()->get('successmessage') }}</h5>
            </div>
        </div>
    </div>
    @error('user_email')
        <div id="message" class="row ">
            <div class="col offset-s3 s6">
                <div class="card red lighten-5">
                    <h5 class="center card-content red-text" style="text-transform: uppercase;">
                        Please sign in OR sign up IN order to complete this action</h5>
                </div>
            </div>
        </div>
    @enderror


    <div class="container height ">
        <h3 class=" pink-text " style="margin-left: 30px">Flower</h3>
        <div class="container row center " style="width: 100%; padding-left: 100px;">
            <div class="row s5 ">
                <div class=" col s5 ">
                    <img class="right pink" style="padding: 10px;" src="{{ $flower[0]['image_url'] }}" alt="flower"
                        width="430px" height="470">
                </div>
                <div class=" col s6 infos">
                    @if (session()->get('adminemail'))
                        <form id="flowerupdate" style="margin-top: 90px"
                            action="{{ route('flowers.update', $flower[0]['flowers_id']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input hidden name="flowers_id" required type="number" value="{{ $flower[0]['flowers_id'] }}">
                            <input class="left" name="name" required
                                style="text-transform: uppercase; font-size: 30px; " type="text"
                                value="{{ $flower[0]['name'] }}">
                                
                            <select style="display: block !important;" name="categorie">
                                <option value="" disabled selected>categories</option>
                                <option value="winter" {{ $flower[0]['categorie'] == 'winter' ? 'selected' : '' }} >Winter</option>
                                <option value="cactuses" {{ $flower[0]['categorie'] == 'cactuses' ? 'selected' : '' }}>Cactuses</option>
                                <option value="exotic" {{ $flower[0]['categorie'] == 'exotic' ? 'selected' : '' }}>Exotic</option>
                                <option value="greens" {{ $flower[0]['categorie'] == 'greens' ? 'selected' : '' }}>Greens</option>
                                <option value="various" {{ $flower[0]['categorie'] == 'various' ? 'selected' : '' }}>Various</option>
                            </select>
                            <br>
                            <textarea required class="grey lighten-3" style="height: 150px" placeholder="Details" name="detail">{{ $flower[0]['detail'] }}</textarea>
                            <div class="row">
                                <h5 class="col" style="margin-top: 20px;">Price: </h5>
                                <input required class="left col" name="price" style="width: 100px; font-size: 20px;"
                                    type="number" value="{{ $flower[0]['price'] }}">
                            </div>
                            <input class="btn btn-large green left add-to-cart" type="submit" value="UPDATE">
                        </form>
                    @else
                        <h3 class="left" style="text-transform: uppercase">{{ $flower[0]['name'] }}</h3>
                        <h6 class="" style="text-transform: uppercase; margin: -15px 0 20px 0;">
                            {{ $flower[0]['categorie'] }}</h6>
                        <p class="details">{{ $flower[0]['detail'] }}</p>
                        <h5>Price: <span class="pink-text">{{ $flower[0]['price'] }}$</span></h5>
                    @endif

                    <br>
                    <div class="row">
                        <form class="col" action="{{ route('carts.store') }}" method="POST">
                            @csrf
                            <input hidden name="flower_id" value="{{ $flower[0]['flowers_id'] }}">
                            <input hidden name="user_email"
                                value="{{ session()->get('user_email') != null ? session()->get('user_email') : session()->get('adminemail') }}">
                            <input hidden name="quantity" value="1">
                            <input class="btn btn-large pink add-to-cart" type="submit" value="Add to cart">
                        </form>
                        @if (session()->get('adminemail'))
                            <form class="col" action="{{ route('flowers.destroy', $flower[0]['flowers_id']) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-large red add-to-cart" type="submit" value="DELETE">
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection()
