@extends('layout.app')


@include('layout.head', ['title' => 'Cart'])
<style>
    .height {
        width: 100%;
        padding-top: 50px;
        margin-bottom: 150px;
    }
</style>
@section('content')
    <div class="container height ">
        <div class="center" style="width: 100%;">
            <table class="container highlight">

                <div class="section red-text" style="font-size: 25px">{{ session()->get('error') }}</div>

                <div class="row " style="{{ session()->get('successmessage') == '' ? 'display:none;' : '' }}">
                    <div class="col offset-s3 s6">
                        <div class="card green lighten-5">
                            <h5 class="center card-content green-text" style="text-transform: uppercase;">
                                {{ session()->get('successmessage') }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3 class="pink white-text center col s6 offset-s3" style="padding: 10px;">Cart <i
                            class="small material-icons">local_mall
                        </i></h3>

                </div>
                <thead>
                    <tr>
                        <th>Flower Image</th>
                        <th>Flower Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @if (session()->get('user_email') || session()->get('adminemail'))
                        <?php $i = 0;
                        $total = 0; ?>
                        @foreach ($items as $item)
                            <tr>
                                <td><img src="{{ $item[0]['image_url'] }}" alt="flower" width="100px" height="100px">
                                </td>
                                <td> <a href="{{ route('flowers.show', $item[0]['flowers_id']) }}"
                                        style="text-decoration: underline">{{ $item[0]['name'] }} </a></td>
                                <td>{{ $item[0]['price'] }}$</td>
                                <td>{{ $quantity[$i] }}</td>
                                <td>
                                    <form action="{{ route('carts.destroy', $item[0]['flowers_id']) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn-flat" type="submit"><i
                                                class="material-icons red-text">delete</i></button>
                                    </form>
                                </td>
                            </tr>

                            <?php ++$i;
                            $total += $item[0]['price']; ?>
                        @endforeach

                </tbody>
            </table>
            @if (session()->get('user_email') || (session()->get('adminemail') && isset($items[0])))
                <div class="container " style="margin-top: 20px; ">
                    <h5 class="left ">Total: <span class="pink-text">{{ $total }}$</span> </h5>
                    <button class="btn pink right"
                        onclick="{document.getElementById('modal').style.display = 'block'}">checkout</button>

                    <div id="modal"
                        style="display: none; border: 2px solid rgb(196, 0, 121); background: white; padding: 10px; height: 300px; width: 400px; margin-left: 200px; position:absolute; top: 200px;">

                        <div class="row">
                            <form class="col s12" action="{{ route('order.store') }}" method="POST">
                                @csrf
                                @foreach ($items as $item)
                                    <input type="number" hidden name="id[]" value="{{ $item[0]['flowers_id'] }}">
                                @endforeach
                                <input type="number" hidden name="total" value="{{ $total }}">
                                <input type="number" hidden name="quantity" value="{{ count($items) }}">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="loc" name="location" type="text" class="validate">
                                        <label for="loc">location</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="pho" name="phone" type="text" class="validate">
                                        <label for="pho">Phone Number</label>
                                    </div>
                                </div>
                                <button class="btn pink" type="submit">checkout</button>
                                <button class="btn "
                                    onclick="{document.getElementById('modal').style.display = 'none'}">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @else
            </tbody>
            </table>
            <h3 class="center pink-text" style="margin-top: 40px; padding-bottom:300px;">Please sign in</h3>
            @endif
        </div>
    </div>
@endsection()
