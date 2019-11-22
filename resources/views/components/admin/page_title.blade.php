<div class="pb-2 mb-3 border-bottom">
    <div class="flex justify-between items-center">

        <h4 class="h4">
            {{ ucfirst($title) }}
            <span class="text-gray-700">
                {{ ($records_count ?? null) ? '('.$records_count.')' : null }}
            </span>
        </h4>

        {{ $slot }}

    </div>
</div>