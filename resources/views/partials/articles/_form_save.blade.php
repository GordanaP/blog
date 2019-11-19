<form action="{{ $route }}" method="POST" enctype="multipart/form-data">

    @csrf

    @if (request()->route('article'))
        @method('PUT')
    @endif

    <p class="text-sm mb-3 text-gray-600 font-serif">* Required fields</p>

    <!-- Role -->
    @admin
        <div class="form-group">
            <label for="user_id">Author: @asterisks @endasterisks</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">Select the author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ getSelected($author->id, old('user_id', $article->user_id ?? null)) }}
                    >
                        {{ $author->profile->full_name }}
                    </option>
                @endforeach
            </select>

            @formError(['field' => 'user_id'])@endformError
        </div>
    @endadmin

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title @asterisks @endasterisks</label>
        <input type="text" name="title" id="title" class="form-control"
        placeholder="Article Title" value="{{  old('title', $article->title ?? null) }}">

        @formError(['field' => 'title'])@endformError
    </div>

    <!-- Excerpt -->
    <div class="form-group">
        <label for="excerpt">Excerpt @asterisks @endasterisks</label>
        <textarea name="excerpt" id="excerpt" class="form-control" rows="2"
        placeholder="Article Excerpt">{{ old('excerpt', $article->excerpt ?? null) }}</textarea>

        @formError(['field' => 'excerpt'])@endformError
    </div>

    <!-- Body -->
    <div class="form-group">
        <label for="body">Body @asterisks @endasterisks</label>
        <textarea name="body" id="body" class="form-control" rows="5"
        placeholder="Article Body">{{ old('body', $article->body ?? null) }}</textarea>

        @formError(['field' => 'body'])@endformError
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category @asterisks @endasterisks</label>
        <select name="category_id" id="category_id" class="form-control">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    {{ getSelected($category->id, old('category_id', $article->category_id ?? null)) }}
                >
                    {{ ucfirst($category->name) }}
                </option>
            @endforeach
        </select>

        @formError(['field' => 'category_id'])@endformError
    </div>

    <!-- Tag -->
    <div class="form-group mb-3">
        <p class="mb-1">Tag</p>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tag_id[]" id="tag_{{ $tag->id }}"
                value="{{ $tag->id }}"
                @if ($ids = old('tag_id', isset($article) ? $article->tags->pluck('id') : null)))
                    @foreach ($ids as $tag_id)
                        {{ getChecked($tag->id, $tag_id) }}
                    @endforeach
                @endif
            />
            <span class="mr-3">{{ $tag->name }}</span>
        @endforeach

        @formError(['field' => 'tag_id'])@endformError
    </div>

    <!-- Image -->
    <div class="flex form-group mt-3">
        <div>
            <label for="image">Upload image</label>
            <input type="file" name="image" id="image"
            class="form-control-file">

            @formError(['field' => 'image'])@endformError
        </div>

        @if (isset($article) && $article->hasImage())
            <div class="w-1/4">
                <img src="{{ ArticleImageService::getUrl($article->image) }}"
                alt="Article Image">
            </div>
        @endif
    </div>

    <!-- Approval -->
    <div class="form-group">
        <label>Approve publishing @asterisks @endasterisks</label>
        <p>
            @foreach ($approval_statuses as $key => $value)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_approved"
                        id="{{ $value }}" value="{{ $value }}"
                        {{ getChecked($value, old('is_approved', $article->is_approved ?? null)) }}
                    >
                    <label class="form-check-label"">
                         {{ array_search($value, $approval_statuses) }}
                    </label>
                </div>
            @endforeach
        </p>

        @formError(['field' => 'is_approved'])@endformError
    </div>

    <!-- Publish At -->
    <div class="form-group">
        <label for="publish_at">Publishing Date</label>
        <input type="text" name="publish_at" id="publish_at"
        class="form-control" placeholder="yyyy-mm-dd"
        value="{{ old('publish_at', $article->publish_at_DB_formatted ?? null) }}">

        @formError(['field' => 'publish_at'])@endformError
    </div>

    <!-- Button -->
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success bg-teal-400
            hover:bg-teal-500 text-white">
            {{ $button_title }}
        </button>
    </div>
</form>

@section('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style type="text/css">
        .mark-holiday .ui-state-default { color: red }
    </style>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $( "#publish_at" ).datepicker({
            firstDay: 1,
            dateFormat: "yy-mm-dd",
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            beforeShowDay: function(date) {
                var year = date.getFullYear();
                var formattedDate = jQuery.datepicker.formatDate('yy-mm-dd', date);
                var holidays = getHolidays(year);

                if (isSunday(date) || isInArray(formattedDate, holidays)) {
                    return [true, "mark-holiday"];
                } else {
                    return [true];
                }
            }
        });
    </script>
@endsection
