@props(['name','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
        <textarea required
                class="form-control"
                name="{{$name}}"
                cols="20"
                rows="5">{!! old($name,$value) !!}
        </textarea>
    <x-error :name="$name" />
</x-form.input-wrapper>