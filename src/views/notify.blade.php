@auth
    <link rel="stylesheet" href="{{ asset('vendor/sessionout/css/session-modal.css') }}" />

    {{-- Modal --}}
    <div id="modal-devsrv">
        <label class="modal-devsrv__bg" onclick="closeSessionOutModal();"></label>
        <div class="modal-devsrv__inner">
            <label class="modal-devsrv__close" onclick="closeSessionOutModal();"></label>
            <h2>SESSION EXPIRED!</h2>
            <p>Your session has expired,</p>
            <p>to resume your current activity please login again in another tab</p>
        </div>
    </div>

<script type="text/javascript">
    window.sessionout = window.sessionout || {};
    sessionout.authStatus = 1;
    sessionout.authpingEndpoint = "{{ route('sessionout.chkauth') }}";
</script>
<script type="text/javascript" src="{{ asset('vendor/sessionout/dist/js/main.js') }}"></script>
<script type="text/javascript">
    function closeSessionOutModal(){
        document.getElementById("modal-devsrv").style.visibility = "hidden";
    }
</script>
@endauth
