@for ($i = 1; $i < 6; $i++)
    <button type="submit" name="rating" value="{{ $i }}">
        <i class="fa
        {{ $article->isRatedBy($user) || !isset($user) ? '' :  'hover:text-yellow-600'}}
        {{ $i <= $article->average_rating ? 'text-yellow-400 fa-star' : 'fa-star-o' }}"></i>
    </button>
@endfor