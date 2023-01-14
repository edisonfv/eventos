@php $editing = isset($category) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            :value="old('name', ($editing ? $category->name : ''))"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="observation"
            label="Observation"
            maxlength="255"
            required
            >{{ old('observation', ($editing ? $category->observation : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>