@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Vardas</th>
                              <th>Pavardė</th>
                              <th>Telefonas</th>
                              <th>El. paštas</th>
                              <th>Adresas</th>
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
                                  <a class="btn btn-info" href="{{ route('draudimas.edit', $klientas->id) }}">Redaguoti</a>
                                  <a class="btn btn-danger" href="{{ route('draudimas.delete', $klientas->id) }}">Ištrinti</a>
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
