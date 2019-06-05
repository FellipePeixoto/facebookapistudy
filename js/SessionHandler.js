function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(prop) {
    var value = getCookie(prop);
    if (value == "")
        return false;

    return true;
}

function logar() {
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                console.log(response);
                document.cookie = "id=" + response.id + ";";
                document.cookie = "name=" + response.name + ";";
                window.location = "PlayerLogin.php";
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    });
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '440835713377967',
        xfbml: true,
        version: 'v3.3'
    });
    FB.AppEvents.logPageView();
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function checkAll() {
    logar();
}