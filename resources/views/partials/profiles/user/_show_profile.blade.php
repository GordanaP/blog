<div class="card mb-4 box-shadow h-md-250">
    <strong class="ml-4 mt-3 text-primary">Biography</strong>
    <div class="card-body">
        <img src="{{ $profile->avatar ? ProfileImageService::getUrl($profile->avatar)
        : asset('images/profile_default.png') }}" class="float-left mr-3 rounded-full" alt="Avatar">

        <p class="mb-auto text-gray-600">
            {{ $profile->biography }}
        </p>
    </div>
</div>