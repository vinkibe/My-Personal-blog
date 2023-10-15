@extends('layout')

@section('head')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endsection

@section('main')
<main class="container" style="background-color: rgba(8, 20, 44, 0.856);">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Create New Category!</h1>

        @include('includes.flash-message')

    <!--contact-->
        <div class="contact-form">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <label for="name"><span>Name</span></label>
                <input style="color:rgba(0, 2, 7, 0.856)" type="text" id="name" name="name" value="{{ old('name') }}"/>

                @error('name')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <input style="color:rgba(8, 20, 44, 0.856); background-color:rgba(0, 255, 255, 0.685)" type="submit" value="s u b m i t"/>

            </form>
        </div>
        <div class="create-categories">
            <a href="{{ route('categories.index') }}">Categories list <span>&#8594;</span></a>
        </div>

    </section>

</main>

@endsection

