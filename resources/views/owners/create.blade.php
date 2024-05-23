@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ __("Pridėti naują klientą") }}</b>
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
                        <form method="post" action="{{ route('owners.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Vardas") }}:</label>
                                <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Pavardė") }}:</label>
                                <input type="text" class="form-control @error('surname')is-invalid @enderror" name="surname" value="{{old('surname')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Telefonas") }}:</label>
                                <input type="text" class="form-control @error('phone')is-invalid @enderror" name="phone" value="{{old('phone')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("El. paštas") }}:</label>
                                <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Adresas") }}:</label>
                                <input type="text" class="form-control @error('address')is-invalid @enderror" name="address" value="{{old('address')}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Valdytojas") }}:</label>
                                <select name="user_id" class="form-select">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($user->id==old('user_id')) selected @endif>{{ $user->name }} </option>
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
