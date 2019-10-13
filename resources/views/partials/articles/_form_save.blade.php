<form action="{{ $route }}" method="POST">

    @csrf

    @if (request()->route('article'))
        @method('PUT')
    @endif

    <div class="card card-body">

        <!-- Title -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"
            placeholder="Article Title" value="{{ old('title', $article->title ?? null ) }}">

            <p class="text-xs text-danger">{{ $errors->first('title') }}</p>
        </div>

        <!-- Excerpt -->
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea name="excerpt" id="excerpt" class="form-control" rows="2"
            placeholder="Article Excerpt">{{ old('excerpt', $article->excerpt ?? null) }}</textarea>

            <p class="text-xs text-danger">{{ $errors->first('excerpt') }}</p>
        </div>

        <!-- Body -->
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control" rows="5"
            placeholder="Article Body">{{ old('body', $article->body ?? null) }}</textarea>

            <p class="text-xs text-danger">{{ $errors->first('body') }}</p>
        </div>

        <!-- Button -->
        <div class="form-group">
            <button type="submit" class="btn btn-success">
                {{ $button_title }}
            </button>
        </div>
    </div>

</form>