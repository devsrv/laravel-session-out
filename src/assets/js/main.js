import axios from 'axios';

function chkAuth(){
    if( parseInt(window.sessionout.authStatus) === 1){
        
        axios.post(`${window.sessionout.authpingEndpoint}`, {
            pinguser: 1,
        })
            .then(function (response) {
                if (parseInt(response.data.auth) === 0){
                    // show modal
                    document.getElementById("modal-devsrv").style.visibility = "visible";

                    // no need for further check
                    window.sessionout.authStatus = 0;
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

(function(){
    // check every minute if not logged out already
    setInterval(chkAuth, parseInt(window.sessionout.requestGap) * 1000);

    // listen for laravel echo
    Echo.private(`user.sessiotrack.${ window.sessionout.userId }`)
        .listen('.session.active', (e) => {
            // user auth session resumed
            window.sessionout.authStatus = 1;
            // close the notification modal
            document.getElementById("modal-devsrv").style.visibility = "hidden";
        });
})();

