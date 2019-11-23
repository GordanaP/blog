<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $tag->id }}
        @endrowInfo

        @rowInfo(['name' => 'Name'])
            {{ $tag->name }}
        @endrowInfo

        @rowInfo(['name' => 'Created'])
            {{ $tag->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $tag->updated_at }}
        @endrowInfo
    </tbody>
</table>