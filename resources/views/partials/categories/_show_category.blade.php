<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $category->id }}
        @endrowInfo

        @rowInfo(['name' => 'Name'])
            {{ $category->name }}
        @endrowInfo

        @rowInfo(['name' => 'Created'])
            {{ $category->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $category->updated_at }}
        @endrowInfo
    </tbody>
</table>