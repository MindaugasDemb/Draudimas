@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('owners.create') }}">Pridėti naują klientą</a>
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Vardas</th>
                              <th>Pavardė</th>
                              <th>Telefonas</th>
                              <th>El. paštas</th>
                              <th>Adresas</th>
                              <th>Automobilis(-iai)</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($klientai as $klientas)
                          <tr>
                              <td>{{ $klientas->name }}</td>
                              <td>{{ $klientas->surname }}</td>
                              <td>{{ $klientas->phone }}</td>
                              <td>{{ $klientas->email }}</td>
                              <td>{{ $klientas->address }}</td>
                              <td>
                                  @foreach( $klientas->cars as $car)
                                      {{ $car->brand }} {{ $car->model }}<br>
                                  @endforeach
                              </td>
                              <td>
                                  <a class="btn btn-info" href="{{ route('owners.edit', $klientas->id) }}">Redaguoti</a>
                                  <a class="btn btn-danger" href="{{ route('owners.delete', $klientas->id) }}">Ištrinti</a>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
