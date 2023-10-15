@extends('layout')

@section('head')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('main')
    <main class="container" style="background-color: rgba(8, 20, 44, 0.856);">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit Category!</h1>
            @include('includes.flash-message')
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('categories.update', $category) }}" method="post" >
                    @method('put')
                    @csrf
                    <!-- name -->
                    <label for="name"><span>Name</span></label>
                    <input style="color:rgba(8, 20, 44, 0.856)" type="text" id="name" name="name" value="{{ $category->name }}" />
                    @error('name')
                        {{-- The $attributeValue field is/must be $validationRule --}}
                        <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                    @enderror

                    <!-- Button -->
                    <input style="color:rgba(8, 20, 44, 0.856); background-color:rgba(0, 255, 255, 0.685)" type="submit" value="s u b m i t"/>
                </form>
            </div>
            <div class="create-categories">
                <a href="{{route('categories.index')}}">Categories list <span>&#8594;</span></a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
