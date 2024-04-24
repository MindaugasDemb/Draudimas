@extends('layouts.app')

@section("content")
    <div class="container">
        <div  class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ __("Redaguojamas automobilis") }}</b>
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
                        <form method="post" action="{{ route('cars.update', $car)}}"  enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">{{ __("Registracijos num.") }}:</label>
                                <input type="text" class="form-control @error('reg_number')is-invalid @enderror" name="reg_number" value="{{$car->reg_number}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Markė") }}:</label>
                                <input type="text" class="form-control @error('brand')is-invalid @enderror" name="brand" value="{{$car->brand}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Modelis") }}:</label>
                                <input type="text" class="form-control @error('model')is-invalid @enderror" name="model" value="{{$car->model}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __("Savininkas") }}:</label>
                                <select name="owner_id" class="form-select">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $owner->id == $car->owner_id ? 'selected' : "" }} >
                                            {{ $owner->name }} {{ $owner->surname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if ($car->img!=null)
                                @foreach( $car->img as $img)
                                <div class="mb-3 alert alert-info">
                                    <img src="{{  route('cars.img', ['id'=>$car->id,'file_hash'=>$img->file,'file_name'=>$img->file_name]) }}" alt="">
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{  route('cars.imgDelete', ['id'=>$img->id,'file_hash'=>$img->file,'file_name'=>$img->file_name]) }}" class="btn btn-danger btn-sm ">Ištrinti</a>
                                </div>
                                @endforeach

                            @endif

                            <div class="mb-3">
                                <label class="form-label">Dokumentai</label>
                                <input type="file" class="form-control" name="img" >
                            </div>

                            <button class="btn btn-success">{{ __("Išsaugoti") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
