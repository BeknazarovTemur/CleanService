<x-layouts.main>
    <x-slot:title>
        Edit Post - {{ $post->id }}
    </x-slot:title>

    <x-page-header>
        Edit Post - {{ $post->id }}
    </x-page-header>

    <div class="container">
        <div class="w-50 mx-auto py-4">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('posts.update', ['post'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="control-group mb-4">
                        <input type="text" class="form-control p-4" name="title" value="{{ $post->title }}" placeholder="Title"/>
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group mb-4">
                        <input name="image" type="file" class="form-control p-1" id="subject" placeholder="Image"/>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Short Content">{{ $post->short_content }}</textarea>
                        @error('short_content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="control-group mb-4">
                        <textarea class="form-control p-4" rows="7" name="content" placeholder="Content">{{ $post->content }}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex">
                        <button class="btn btn-success py-3 px-5" type="submit">Save</button>
                        <a href="{{ route('posts.show', ['post'=>$post->id]) }}" class="btn btn-danger py-3 px-5" type="submit">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.main>
