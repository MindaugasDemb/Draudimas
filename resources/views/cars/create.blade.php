@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ __("Pridėti naują automobilį") }}</b>
                        <br>
                        {{ __('Pagalba telefonu') }}: [[tel]] <br>
                        {{ __('El. paštas klausimams') }}: [[mail]]
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{__($error)}}</div>
                                @endforeach
                            </div>
                        @endif
                        <form method="post" action="{{ route('cars.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Registracijos num.") }}:</label>
                                <input type="text" class="form-control @error('reg_number')is-invalid @enderror" name="reg_number" value="{{old('reg_number')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Markė") }}:</label>
                                <input type="text" class="form-control @error('brand')is-invalid @enderror" name="brand" value="{{old('brand')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Modelis") }}:</label>
                                <input type="text" class="form-control @error('model')is-invalid @enderror" name="model" value="{{old('model')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Savininkas") }}:</label>
                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" @if($owner->id==old('owner_id')) selected @endif>{{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success">{{ __("Pridėti") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
