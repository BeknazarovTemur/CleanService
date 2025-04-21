<x-layouts.main>
    <x-slot:title>
        Create Post
    </x-slot:title>

    <x-page-header>
        Create Post
    </x-page-header>
        <div class="container">
            <div class="w-50 mx-auto py-4">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="control-group">
                            <input type="text" class="form-control p-4" name="title" placeholder="Title" required="required"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        {{--<div class="control-group">
                            <input type="file" class="form-control p-1" id="subject" placeholder="Image"/>
                            <p class="help-block text-danger"></p>
                        </div>--}}
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="3" name="short_content" placeholder="Short Content" required="required"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="7" name="content" placeholder="Content" required="required"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layouts.main>
