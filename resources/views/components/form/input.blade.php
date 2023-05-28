@props(['name','value'=>''])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
        <input required
                type="text"
                class="form-control"
                name="{{$name}}"
                value="{{old($name,$value)}}">
        <x-error :name="$name" />
</x-form.input-wrapper>