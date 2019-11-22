<table class="table mb-0">
    <tbody class="bg-white border">
        @rowInfo(['name' => 'ID'])
            {{ $role->id }}
        @endrowInfo

        @rowInfo(['name' => 'Name'])
            {{ $role->name }}
        @endrowInfo

        @rowInfo(['name' => 'Created'])
            {{ $role->created_at }}
        @endrowInfo

        @rowInfo(['name' => 'Last update'])
            {{ $role->updated_at }}
        @endrowInfo

        @rowInfo(['name' => 'Users'])
            <a href="#">
                View
            </a>
        @endrowInfo
    </tbody>
</table>