@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column align-items-center gap-4">
        <img src="{{ asset('assets/volvo_s60/red_17inch.jpg') }}" class="img-fluid" alt="{{ $product->name }}" id="productImage">
        <h1 class="my-1">{{ $product->name }}</h1>
        <div class="row mx-0 col-md-6 col-12">
            <span class="px-0">Choose your body color:</span>
            @foreach($product->bodyColors as $bodyColor)
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="bodyColor" id="{{ $bodyColor->name }}" style="cursor: pointer"
                        value="{{ $bodyColor->id }}" @if ($bodyColor->is_default) checked @endif>
                    <label class="form-check-label" for="{{ $bodyColor->name }}" style="cursor: pointer">
                        {{ $bodyColor->name }}
                    </label>
                </div>
            @endforeach
        </div>
        <div class="row mx-0 col-md-6 col-12">
            <span class="px-0">Choose your wheel trim:</span>
            @foreach($product->wheelTrims as $wheelTrim)
                <div class="form-check col-12">
                    <input class="form-check-input" type="radio" name="wheelTrim" id="{{ $wheelTrim->name }}" style="cursor: pointer" 
                        value="{{ $wheelTrim->id }}" @if ($wheelTrim->is_default) checked @endif>
                    <label class="form-check-label" for="{{ $wheelTrim->name }}" style="cursor: pointer">
                        {{ $wheelTrim->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(() => {
            const bodyColors = document.querySelectorAll('input[name="bodyColor"]')
            const wheelTrims = document.querySelectorAll('input[name="wheelTrim"]')

            let checkedBodyColor, checkedWheelTrim

            const findCheckedRadioButton = radioButtons => {
                for (const radioButton of radioButtons) {
                    if (radioButton.checked) {
                        return radioButton
                    }
                }
            }

            bodyColors.forEach(bodyColor => {
                bodyColor.addEventListener('change', event => {
                    event.preventDefault()

                    checkedWheelTrim = findCheckedRadioButton(wheelTrims)

                    changeProductImage(bodyColor, checkedWheelTrim)
                })
            })

            wheelTrims.forEach(wheelTrim => {
                wheelTrim.addEventListener('change', event => {
                    event.preventDefault()

                    checkedBodyColor = findCheckedRadioButton(bodyColors)

                    changeProductImage(checkedBodyColor, wheelTrim)
                })
            })

            const changeProductImage = (bodyColor, wheelTrim) => {
                let data = {
                    '_token': '{{ csrf_token() }}',
                    'bodyColor': bodyColor.value,
                    'wheelTrim': wheelTrim.value,
                }

                $.ajax({
                    url: '{{ route('changeProductImage', $product->id) }}',
                    type: 'POST',
                    data: data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: ({ message, data }) => {
                        const productImage = document.getElementById('productImage')
                        const publicFolderSrc = '{{ asset('') }}'

                        productImage.src = `${publicFolderSrc}${data.src}`

                        console.log(message)
                    },
                    error: ({ message }) => console.error(message)
                })
            }
        })
    </script>
@endpush