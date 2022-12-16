@extends('layout.app')

@include('layout.head', ['title' => 'Orders'])


@section('content')
    <div style="height: 900px;  justify-content: center; ">
        <h3 class="left" style="padding-left: 20px;">Orders</h3>
        <div style="padding: 20px;">
            <table class="striped ">
                <thead>
                    <tr>
                        <th data-field="id">Flowers ID</th>
                        <th data-field="loacton">Location</th>
                        <th data-field="phone">Phone.N</th>
                        <th data-field="Total">Total</th>
                        <th data-field="Quantity">Quantity</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>@foreach ($order['items_id'] as $id)
                                {{ $id.', ' }}
                            @endforeach</td>
                            <td>{{ $order['location'] }}</td>
                            <td>{{ $order['phone'] }}</td>
                            <td>{{ $order['total'] }}</td>
                            <td>{{ $order['quantity'] }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
