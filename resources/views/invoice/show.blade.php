@extends('app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-header">
                    Comprobante  {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }}
                </h2>

                <div class="well well-sm">
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control typeahead" type="text" readonly value="{{ $model->client->nombre }}" />
                        </div>
                        <div class="col-xs-2">
                            <input class="form-control" type="text" readonly value={{ $model->client->direccion }} />
                        </div>
                        <div class="col-xs-4">
                            <input class="form-control" type="text" readonly value={{ $model->client->email }} />
                        </div>
                    </div>
                </div>

                <hr />

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Articulo</th>
                        <th >Cantidad</th>
                        <th >Precio</th>
                        <th >Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($model->invoice_details as $d)
                            <tr>
                                <td>{{$d->article->nombre}}</td>
                                <td >{{$d->cantidad}}</td>
                                <td >$ {{number_format($d->precio, 2)}}</td>
                                <td >$ {{number_format($d->total_line, 2)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="text-right"><b>Total</b></td>
                        <td class="text-right">$ {{ number_format($model->total, 2) }}</td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
@endsection