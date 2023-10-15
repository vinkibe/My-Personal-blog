@extends('layout')

@section('head')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endsection

@section('main')
<main class="container" style="background-color: rgba(8, 20, 44, 1);">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Create New post!</h1>

        @include('includes.flash-message')

    <!--contact-->
        <div class="contact-form">
            <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title"><span>Title</span></label>
                <input style="color:rgba(0, 2, 7, 0.856)" type="text" id="title" name="title" value="{{ old('title') }}"/>

                @error('title')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <label for="image"><span>Image</span></label>
                <input style="color:aqua" type="file" id="image" name="image"/>

                @error('image')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <!-- Drop down -->
                <label for="categories"><span>Choose a category:</span></label>
                <select style= "color:rgb(9, 3, 87)" name="category_id" id="categories">
                    <option selected disabled>Select option </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror


                <label for="body"><span>Body</span></label>
                <textarea  style="color:rgba(0, 2, 7, 0.856)" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>

                @error('body')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <input style="color:rgba(8, 20, 44, 0.856); background-color:rgba(0, 255, 255, 0.685)" type="submit" value="s u b m i t"/>

            </form>
        </div>

    </section>

</main>

@endsection

@section('scripts')
<script>
    CKEDITOR.replace( 'body' );
</script>

@endsection
