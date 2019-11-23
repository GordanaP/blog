<div class="pb-2 mb-3 border-bottom">
    <div class="flex justify-between items-center">

        <h4 class="h4">
            {{ ucfirst($title) }}

            @if (isset($records_count))
                <span class="badge bg-gray-700 rounded-full text-white">
                    {{ $records_count }}
                </span>
            @endif

        </h4>

        {{ $slot }}

    </div>
</div>