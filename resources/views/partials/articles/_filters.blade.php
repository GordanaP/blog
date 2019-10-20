<div class="sidebar-module">
    @filterTitle([
        'filter' => $filter,
        'routeName' => $routeName,
        'user' => $user ?? ''
    ])
    @endfilterTitle

    @if ($filter !== 'category')
        @filters([
            'query' => $query,
            'filter' => $filter,
        ])
        @endfilters
    @else
        <div class="row">
            @foreach ($categoriesQuery as $chunks)
                <div class="col-lg-6">
                    @filters([
                        'query' => $chunks,
                        'filter' => $filter
                    ])
                    @endfilters
                </div>
            @endforeach
        </div>
    @endif
</div>
