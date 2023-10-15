@extends('layout')

@section('head')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endsection

@section('main')
<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1 style="padding-top: 50px;">Edit Blog post!</h1>

        @include('includes.flash-message')

    <!--contact-->
        <div class="contact-form">
            <form action="{{ route('blog.update', $post) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label for="title"><span>Title</span></label>
                <input style="color:rgba(0, 2, 7, 0.856)" type="text" id="title" name="title" value="{{ $post->title }}"/>

                @error('title')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <label for="image"><span>Image</span></label>
                <input style="color:rgba(0, 2, 7, 0.856)" type="file" id="image" name="image"/>

                @error('image')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror


                <label for="body"><span>Body</span></label>
                <textarea style="color:rgba(0, 2, 7, 0.856)" name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>

                @error('body')
                {{-- the $attributeValue field mist be $validationRule --}}
                    <p style="color: maroon; margin-bottom:25px">{{ $message }}</p>

                @enderror

                <input type="submit" value="submit"/>

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
