<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive email layout.">

    <title>Catalyst</title>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

<!-- Font Awesome -->
<link href="awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="/combo/1.17.4?/css/layouts/email-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/theme.css">
    <!--<![endif]-->
    
<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
<![endif]-->

</head>
<body>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      //testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '272953162901345',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
function fbAPICall() 
{
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) 
        {
                var id = response.id;
                var name = response.name;
                var email = response.email;
		//window.location.assign("http://shredfeed.com/login.php?id=" + id + "&name=" + response.name)
        });
}

function doLogin() 
{  
        FB.login(function(response) 
        {
		fbAPICall();

        } , {perms:'public_profile,email'}); 
}
</script>


<div id="layout" class="content pure-g">
    <div id="nav" class="pure-u">
        <a href="#" class="nav-menu-button">Menu</a>

        <div class="nav-inner">
            <button onclick="doLogin();" class="primary-button pure-button">Sign in <i class="fa fa-sign-in"></i></button>

            <div class="pure-menu pure-menu-open">
                <ul>
                    <li><a href="#">Most Recent</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="list" class="pure-u-1">
        <div class="email-item email-item-selected pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Tilo Mitra&#x27;s avatar" height="64" width="64" src="/img/common/tilo-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Tilo Mitra</h5>
                <h4 class="email-subject">Hello from Toronto</h4>
                <p class="email-desc">
                    Hey, I just wanted to check in with you from Toronto. I got here earlier today.
                </p>
            </div>
        </div>

        <div class="email-item email-item-unread pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Eric Ferraiuolo&#x27;s avatar" height="64" width="64" src="/img/common/ericf-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Eric Ferraiuolo</h5>
                <h4 class="email-subject">Re: Pull Requests</h4>
                <p class="email-desc">
                    Hey, I had some feedback for pull request #51. We should center the menu so it looks better on mobile.
                </p>
            </div>
        </div>

        <div class="email-item email-item-unread pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="YUI&#x27;s avatar" height="64" width="64" src="/img/common/yui-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">YUI Library</h5>
                <h4 class="email-subject">You have 5 bugs assigned to you</h4>
                <p class="email-desc">
                    Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla.
                </p>
            </div>
        </div>

        <div class="email-item pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Reid Burke&#x27;s avatar" height="64" width="64" src="/img/common/reid-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Reid Burke</h5>
                <h4 class="email-subject">Re: Design Language</h4>
                <p class="email-desc">
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa.
                </p>
            </div>
        </div>

        <div class="email-item pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Andrew Wooldridge&#x27;s avatar" height="64" width="64" src="/img/common/andrew-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Andrew Wooldridge</h5>
                <h4 class="email-subject">YUI Blog Updates?</h4>
                <p class="email-desc">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                </p>
            </div>
        </div>

        <div class="email-item pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Yahoo! Finance&#x27;s Avatar" height="64" width="64" src="/img/common/yfinance-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Yahoo! Finance</h5>
                <h4 class="email-subject">How to protect your finances from winter storms</h4>
                <p class="email-desc">
                    Mauris tempor mi vitae sem aliquet pharetra. Fusce in dui purus, nec malesuada mauris.
                </p>
            </div>
        </div>

        <div class="email-item pure-g">
            <div class="pure-u">
                <img class="email-avatar" alt="Yahoo! News&#x27; avatar" height="64" width="64" src="/img/common/ynews-avatar.png">
            </div>

            <div class="pure-u-3-4">
                <h5 class="email-name">Yahoo! News</h5>
                <h4 class="email-subject">Summary for April 3rd, 2012</h4>
                <p class="email-desc">
                    We found 10 news articles that you may like.
                </p>
            </div>
        </div>
    </div>

    <div id="main" class="pure-u-1">
        <div class="email-content">
            <div class="email-content-header pure-g">
                <div class="pure-u-1-2">
                    <h1 class="email-content-title">Hello from Toronto</h1>
                    <p class="email-content-subtitle">
                        From <a>Tilo Mitra</a> at <span>3:56pm, April 3, 2012</span>
                    </p>
                </div>

                <div class="email-content-controls pure-u-1-2">
                    <button class="secondary-button pure-button">Reply</button>
                    <button class="secondary-button pure-button">Forward</button>
                    <button class="secondary-button pure-button">Move to</button>
                </div>
            </div>

            <div class="email-content-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <p>
                    Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p>
                    Aliquam ac feugiat dolor. Proin mattis massa sit amet enim iaculis tincidunt. Mauris tempor mi vitae sem aliquet pharetra. Fusce in dui purus, nec malesuada mauris. Curabitur ornare arcu quis mi blandit laoreet. Vivamus imperdiet fermentum mauris, ac posuere urna tempor at. Duis pellentesque justo ac sapien aliquet egestas. Morbi enim mi, porta eget ullamcorper at, pharetra id lorem.
                </p>
                <p>
                    Donec sagittis dolor ut quam pharetra pretium varius in nibh. Suspendisse potenti. Donec imperdiet, velit vel adipiscing bibendum, leo eros tristique augue, eu rutrum lacus sapien vel quam. Nam orci arcu, luctus quis vestibulum ut, ullamcorper ut enim. Morbi semper erat quis orci aliquet condimentum. Nam interdum mauris sed massa dignissim rhoncus.
                </p>
                <p>
                    Regards,<br>
                    Tilo
                </p>
            </div>
        </div>
    </div>
</div>

<script src="http://yui.yahooapis.com/3.17.2/build/yui/yui-min.js"></script>

<script>
    YUI().use('node-base', 'node-event-delegate', function (Y) {

        var menuButton = Y.one('.nav-menu-button'),
            nav        = Y.one('#nav');

        // Setting the active class name expands the menu vertically on small screens.
        menuButton.on('click', function (e) {
            nav.toggleClass('active');
        });

        // Your application code goes here...

    });
</script>


<script>
(function (root) {
// -- Data --
root.YUI_config = {"version":"3.17.2","base":"http:\u002F\u002Fyui.yahooapis.com\u002F3.17.2\u002F","comboBase":"http:\u002F\u002Fyui.yahooapis.com\u002Fcombo?","comboSep":"&","root":"3.17.2\u002F","filter":"min","logLevel":"error","combine":true,"patches":[],"maxURLLength":2048,"groups":{"vendor":{"combine":true,"comboBase":"\u002Fcombo\u002F1.17.4?","base":"\u002F","root":"\u002F","modules":{"css-mediaquery":{"path":"vendor\u002Fcss-mediaquery.js"},"handlebars-runtime":{"path":"vendor\u002Fhandlebars.runtime.js"}}},"app":{"combine":true,"comboBase":"\u002Fcombo\u002F1.17.4?","base":"\u002Fjs\u002F","root":"\u002Fjs\u002F"}}};
root.app || (root.app = {});
root.app.yui = {"use":function () { return this._bootstrap('use', [].slice.call(arguments)); },"require":function () { this._bootstrap('require', [].slice.call(arguments)); },"ready":function (callback) { this.use(function () { callback(); }); },"_bootstrap":function bootstrap(method, args) { var self = this, d = document, head = d.getElementsByTagName('head')[0], ie = /MSIE/.test(navigator.userAgent), callback = [], config = typeof YUI_config != "undefined" ? YUI_config : {}; function flush() { var l = callback.length, i; if (!self.YUI && typeof YUI == "undefined") { throw new Error("YUI was not injected correctly!"); } self.YUI = self.YUI || YUI; for (i = 0; i < l; i++) { callback.shift()(); } } function decrementRequestPending() { self._pending--; if (self._pending <= 0) { setTimeout(flush, 0); } else { load(); } } function createScriptNode(src) { var node = d.createElement('script'); if (node.async) { node.async = false; } if (ie) { node.onreadystatechange = function () { if (/loaded|complete/.test(this.readyState)) { this.onreadystatechange = null; decrementRequestPending(); } }; } else { node.onload = node.onerror = decrementRequestPending; } node.setAttribute('src', src); return node; } function load() { if (!config.seed) { throw new Error('YUI_config.seed array is required.'); } var seed = config.seed, l = seed.length, i, node; if (!self._injected) { self._injected = true; self._pending = seed.length; } for (i = 0; i < l; i++) { node = createScriptNode(seed.shift()); head.appendChild(node); if (node.async !== false) { break; } } } callback.push(function () { var i; if (!self._Y) { self.YUI.Env.core.push.apply(self.YUI.Env.core, config.extendedCore || []); self._Y = self.YUI(); self.use = self._Y.use; if (config.patches && config.patches.length) { for (i = 0; i < config.patches.length; i += 1) { config.patches[i](self._Y, self._Y.Env._loader); } } } self._Y[method].apply(self._Y, args); }); self.YUI = self.YUI || (typeof YUI != "undefined" ? YUI : null); if (!self.YUI && !self._injected) { load(); } else if (self._pending <= 0) { setTimeout(flush, 0); } return this; }};
root.YUI_config || (root.YUI_config = {});
root.YUI_config.seed = ["http:\u002F\u002Fyui.yahooapis.com\u002Fcombo?3.17.2\u002Fyui\u002Fyui-min.js"];
root.YUI_config.groups || (root.YUI_config.groups = {});
root.YUI_config.groups.app || (root.YUI_config.groups.app = {});
root.YUI_config.groups.app.modules = {"start\u002Fapp":{"path":"start\u002Fapp.js","requires":["handlebars-runtime","yui","base-build","router","pjax-base","view","start\u002Fmodels\u002Fgrid","start\u002Fviews\u002Finput","start\u002Fviews\u002Foutput","start\u002Fviews\u002Fdownload"]},"start\u002Fmodels\u002Fgrid":{"path":"start\u002Fmodels\u002Fgrid.js","requires":["yui","querystring","base-build","model","model-sync-rest","start\u002Fmodels\u002Fmq"]},"start\u002Fmodels\u002Fmq":{"path":"start\u002Fmodels\u002Fmq.js","requires":["css-mediaquery","attribute","base-build","model","model-list"]},"start\u002Fviews\u002Fdownload":{"path":"start\u002Fviews\u002Fdownload.js","requires":["yui","base-build","querystring","view"]},"start\u002Fviews\u002Finput":{"path":"start\u002Fviews\u002Finput.js","requires":["base-build","start\u002Fmodels\u002Fmq","start\u002Fviews\u002Ftab"]},"start\u002Fviews\u002Foutput":{"path":"start\u002Fviews\u002Foutput.js","requires":["base-build","escape","start\u002Fviews\u002Ftab"]},"start\u002Fviews\u002Ftab":{"path":"start\u002Fviews\u002Ftab.js","requires":["yui","base-build","view"]}};
}(this));
</script>
<script>
app.yui.use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>






</body>
</html>
