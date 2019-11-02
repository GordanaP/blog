<script type="text/javascript" src="{{ asset('js/helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/form_helpers.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modal_helpers.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('scripts')