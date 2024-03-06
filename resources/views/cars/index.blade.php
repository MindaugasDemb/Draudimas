@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('cars.create') }}">Pridėti naują automobilį</a>
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>Registracijos num.</th>
                              <th>Markė</th>
                              <th>Modelis</th>
                              <th>Savininkas</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($cars as $car)
                          <tr>
                              <td>{{ $car->reg_number }}</td>
                              <td>{{ $car->brand }}</td>
                              <td>{{ $car->model }}</td>
                              <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                              <td style="width: 100px;">
                                  <a href="{{ route('cars.edit', $car) }}" class="btn btn-success">Redaguoti</a>
                              </td>
                              <td style="width: 100px;">
                                  <form method="post" action="{{ route('cars.destroy', $car) }}">
                                      @csrf
                                      @method("delete")
                                      <button class="btn btn-danger">Ištrinti</button>
                                  </form>
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

