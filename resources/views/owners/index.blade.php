@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('owners.create') }}">{{ __("Pridėti naują klientą") }}</a>
                        <br>
                        {{ __('Pagalba telefonu') }}: [[tel]] <br>
                        {{ __('El. paštas klausimams') }}: [[mail]]
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>{{ __("Vardas") }}</th>
                              <th>{{ __("Pavardė") }}</th>
                              <th>{{ __("Telefonas") }}</th>
                              <th>{{ __("El. paštas") }}</th>
                              <th>{{ __("Adresas") }}</th>
                              <th>{{ __("Automobilis(-iai)") }}</th>
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
                                  <a class="btn btn-info" href="{{ route('owners.edit', $klientas->id) }}">{{ __("Redaguoti") }}</a>
                                  <a class="btn btn-danger" href="{{ route('owners.delete', $klientas->id) }}">{{ __("Ištrinti") }}</a>
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
