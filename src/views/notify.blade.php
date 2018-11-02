@auth
    <link rel="stylesheet" href="{{ asset('vendor/sessionout/css/session-modal.css') }}" />

    {{-- Modal --}}
    @include('vendor.sessionout.modal')

<script type="text/javascript">
    window.sessionout = window.sessionout || {};
    sessionout.authpingEndpoint = "{{ route('sessionout.chkauth') }}";
    sessionout.requestGap = {{ config('expiredsession.gap_seconds') }};
    sessionout.userId = {{ auth()->user()->id }};
    sessionout.usingBroadcasting = {{ config('expiredsession.avail_broadcasting') === true? 1 : 0 }};
</script>
<script type="text/javascript" src="{{ asset('vendor/sessionout/dist/js/main.js') }}"></script>
<script type="text/javascript">
    function closeSessionOutModal(){
        document.getElementById("modal-devsrv").style.visibility = "hidden";
    }
</script>
@endauth
