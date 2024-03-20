@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ __("Redaguojamas klientas") }}</b>
                        <br>
                        {{ __('Pagalba telefonu') }}: [[tel]] <br>
                        {{ __('El. paštas klausimams') }}: [[mail]]
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('owners.save', $klientas->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">{{ __("Vardas") }}:</label>
                                <input type="text" class="form-control" name="name" value="{{ $klientas->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Pavardė") }}:</label>
                                <input type="text" class="form-control" name="surname" value="{{ $klientas->surname }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Telefonas") }}:</label>
                                <input type="text" class="form-control" name="phone" value="{{ $klientas->phone }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("El. paštas") }}:</label>
                                <input type="text" class="form-control" name="email" value="{{ $klientas->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Adresas") }}:</label>
                                <input type="text" class="form-control" name="address" value="{{ $klientas->address }}">
                            </div>
                            <button class="btn btn-success">{{ __("Išsaugoti") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
