@extends('layouts.dashboard')
@section('page_heading','Detalhes do Pedido')
@section('section')

    <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center">
                        <i class="fa fa-search-plus pull-left icon"></i>
                        <h2>Pedido #{{$order->id}} - STATUS : ???</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Dados do Cliente</div>
                                <div class="panel-body">
                                    <strong>{{ $order->client->name }}</strong>
                                    {{ $order->client->email }}
                                    <br>
                                    <strong>50 Pedidos</strong><br>
                                    Data : {{ $order->created_at }}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Endereço de Entrega</div>
                                <div class="panel-body">
                                    <strong>Campo Comprido - CIC</strong>
                                    <br>
                                    Rua Maria Homan Wisniewviski, 760
                                    <strong>Curitiba/PR</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Pagamento</div>
                                <div class="panel-body">
                                    <strong>Cartão:</strong> Visa<br>
                                    <strong>Card Number:</strong> ***** 332<br>
                                    <strong>Exp Date:</strong> 09/2020<br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                            <div class="panel panel-default height">
                                <div class="panel-heading">Informações</div>
                                <div class="panel-body">
                                    <strong>Presente:</strong> Não<br>
                                    <strong>Entrega Delivery:</strong> Sim<br>
                                    <strong>Forma pagamento:</strong> Dinheiro<br>
                                    <strong>Cupon Desconto:</strong> Não<br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><strong>Detalhes do Pedido</strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Preço</strong></td>
                                        <td class="text-center"><strong>Quantidade</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0;$entrega=8; ?>
                                    @foreach($order->items as $item)
                                        <?php
                                        $totalQtd = $item->qtd * $item->product->price;
                                        $total = $total + $totalQtd;
                                        ?>
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td class="text-center">R$ {{ number_format($item->product->price,'2',',','.') }}</td>
                                            <td class="text-center">{{ $item->qtd }}</td>
                                            <td class="text-right">R$ {{ number_format($totalQtd,'2',',','.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        <td class="highrow text-right">R$ {{ number_format($total,'2',',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Entrega</strong></td>
                                        <td class="emptyrow text-right">R$ {{ number_format($entrega,'2',',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Total</strong></td>
                                        <td class="emptyrow text-right">R$ {{ number_format($total+$entrega,'2',',','.') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($order->items as $item)
                    <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img data-src="holder.js/100%x200" alt="100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUwMmFjODYwNjMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTAyYWM4NjA2MyI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;">
                        <div class="caption">
                            <h3>{{ $item->product->name }}</h3>
                            <p>Quantidade : {{ $item->qtd }}</p>
                            <p>Preço : R$ {{ number_format($item->product->price,'2',',','.') }}</p>
                            <p>
                                <a href="{{ route('admin.orders.edit',['id'=>$item->id]) }}" class="btn btn-primary" role="button">Cancelar Item</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
@stop