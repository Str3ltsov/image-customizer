@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center gap-4">
        <img src="{{ asset('assets/volvo_s60/red_17inch.jpg') }}" class="img-fluid" alt="image">
        <h1 class="my-1">{{ $product->name }}</h1>
        <div class="row mx-0 col-md-6 col-12">
            <span class="px-0">Choose your body color:</span>
            @foreach($product->bodyColors as $bodyColor)
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="bodyColor" id="{{ $bodyColor->name }}" 
                        value="{{ $bodyColor->id }}" @if ($bodyColor->is_default) checked @endif>
                    <label class="form-check-label" for="{{ $bodyColor->name }}">
                        {{ $bodyColor->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="row mx-0 col-md-6 col-12">
            <span class="px-0">Choose your wheel trim:</span>
            @foreach($product->wheelTrims as $wheelTrim)
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="wheelTrim" id="{{ $wheelTrim->name }}" 
                        value="{{ $wheelTrim->id }}" @if ($wheelTrim->is_default) checked @endif>
                    <label class="form-check-label" for="{{ $wheelTrim->name }}">
                        {{ $wheelTrim->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@endsection