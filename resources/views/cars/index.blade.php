@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-info" href="{{ route('cars.create') }}">{{ __("Pridėti naują automobilį") }}</a>
                        <br>
                        {{ __('Pagalba telefonu') }}: [[tel]] <br>
                        {{ __('El. paštas klausimams') }}: [[mail]]
                        <hr>
                      <table class="table">
                          <thead>
                          <tr>
                              <th>{{ __("Registracijos num.") }}</th>
                              <th>{{ __("Markė") }}</th>
                              <th>{{ __("Modelis") }}</th>
                              <th>{{ __("Savininkas") }}</th>
                              <th>{{ __("Nuotraukos") }}</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($cars as $car)
                              @can('view',$car)
                          <tr>
                              <td>{{ $car->reg_number }}</td>
                              <td>{{ $car->brand }}</td>
                              <td>{{ $car->model }}</td>
                              <td>{{ $car->owner->name }} {{ $car->owner->surname }}</td>
                              <td>
                                  @if ($car->img!=null)
                                      @foreach( $car->img as $img)
                                          <a href="{{  route('cars.img', ['id'=>$car->id,'file_hash'=>$img->file,'file_name'=>$img->file_name]) }}" class="btn btn-primary" target="_blank">Atsiusti</a><br>
                                      @endforeach

                                  @endif
                              </td>
                              <td style="width: 100px;">
                                  @can('update',$car)
                                  <a href="{{ route('cars.edit', $car) }}" class="btn btn-success">{{ __("Redaguoti") }}</a>
                                  @endcan
                              </td>
                              <td style="width: 100px;">
                                  @can('delete',$car)
                                  <form method="post" action="{{ route('cars.destroy', $car) }}">
                                      @csrf
                                      @method("delete")
                                      <button class="btn btn-danger">{{ __("Ištrinti") }}</button>
                                  </form>
                                  @endcan
                              </td>
                          </tr>
                              @endcan
                          @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


