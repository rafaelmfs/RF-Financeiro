@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">
            {{ __('Opa! Algo deu errado.') }}
        </div>


    </div>
@endif
