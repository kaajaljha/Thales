<?php
include("app_logic.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <link  media="all"  rel="stylesheet" href="http://my.softstack-research.co/framework.css" />
  <link  media="all"  rel="stylesheet" href="http://my.softstack-research.co/site.css" />
  <link  media="all"  rel="stylesheet" href="http://my.softstack-research.co/style.css" />
  <link  media="all"  rel="stylesheet" href="https://my.softstack-research.co/framework.css" />
  <link  media="all"  rel="stylesheet" href="https://my.softstack-research.co/site.css" />
  <link  media="all"  rel="stylesheet" href="https://my.softstack-research.co/style.css" />
  <meta name="viewport" content="width=device-width">
  <title>Sign into PayOnGo · Most Advanced Digital Wallet</title>
  <link rel="fluid-icon" href="icon.png" title="Softstack">
  <meta name="selected-link" value="/login" data-pjax-transient>
  <meta name="user-login" content="SoftStack User Login">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7C3296');</script>
<!-- Basic Page Needs =====================================-->
    <meta charset="utf-8">
    <meta name="title" content="Sign in to Softstack Research">
    <meta name="description" content="Softstack brings together the world's largest community of developers to research, share and build better software for organizations">
    <meta name="keywords" content="Softstack brings together the world's largest community of developers to research, share and build better software for organizations">
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Sign in to Softstack Research">
    <meta itemprop="description" content="Softstack brings together the world's largest community of developers to research, share and build better software for organizations">
    <meta itemprop="image" content="http://my.softstack-research.co/icon.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://softstack-research.co/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Sign in to Softstack Research">
    <meta property="og:description" content="Softstack brings together the world's largest community of developers to research, share and build better software for organizations">
    <!--<meta property="og:image" content="images/logo.png">-->

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sign in to Softstack research">
    <meta name="twitter:description" content="Softstack brings together the world's largest community of developers to research, share and build better software for organizations">
    <meta name="twitter:image" content="icon.png">
  <link rel="canonical" href="http://my.softstack-research.co/login" data-pjax-transient>
  <link rel="mask-icon" style="border-radius: 50%;" href="https://my.softstack-research.co/icon.png" color="#000000">
  <link rel="icon" type="image/x-icon" style="border-radius: 50%;" class="js-site-favicon" href="https://my.softstack-research.co/icon.png">
  <meta name="theme-color" content="#1e2327">
  </head>
  <body class="logged-out env-production page-responsive session-authentication" style="background-color: #4a0307;">
  <div class="position-relative js-header-wrapper ">
    <a href="index.php" tabindex="1" class="px-2 py-4 bg-blue text-white show-on-focus js-skip-to-content">Skip to content</a>
    <span class="Progress progress-pjax-loader position-fixed width-full js-pjax-loader-bar">
      <span class="progress-pjax-loader-bar top-0 left-0" style="width: 0%;"></span>
    </span>
      <div class="header header-logged-out width-full pt-5 pb-4" role="banner">
  <div class="container clearfix width-full text-center">
    <a class="header-logo" href="https://softstack-research.co/" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
      <img style="border-radius: 50%" src="icon.png" height="48" viewBox="0 0 16 16" version="1.1" width="48" aria-hidden="true"></img>
    </a>
  </div>
</div>
  </div>
<div id="start-of-content" class="show-on-focus"></div>
<div class="application-main " data-commit-hovercards-enabled>
      <main id="js-pjax-container" data-pjax-container>
<div class="auth-form px-3" id="login">
<form action="index.php" accept-charset="UTF-8" method="post">
<input name="utf8" type="hidden" value="" />
<input type="hidden" name="authenticity_token" value=""/>     
 <input type="hidden" name="ga_id" class="js-octo-ga-id-input">
      <div class="auth-form-header p-0">
        <h1 style="color: #fff;">Sign into PayOnGo</h1>
      </div>
      <div id="js-flash-container">
</div>
      <div class="auth-form-body mt-3">
<?php include('messages.php'); ?>
        <label for="login_field">
          Username or email address
        </label>
        <input type="text" name="user_id" id="login_field" class="form-control input-block" tabindex="1" autocapitalize="off" autocorrect="off" autofocus="autofocus" />

        <label for="password">
          Password <a class="label-link" href="reset_user.php">Forgot password?</a>
        </label>
        <input type="password" name="password" id="password" class="form-control form-control input-block" tabindex="2" />
        <input type="hidden" class="js-webauthn-support" name="webauthn-support" value="unknown">
        <input type="hidden" class="js-webauthn-iuvpaa-support" name="webauthn-iuvpaa-support" value="unknown">

        <input type="text" name="required_field_a927" id="required_field_a927" hidden="hidden" class="form-control" />
<input type="hidden" name="timestamp" value="1573073107579" class="form-control" />
<input type="hidden" name="timestamp_secret" value="4abebfdb3e015df6beca9c1ba082bbf133c0af38912745c0914970fe7d88eb39" class="form-control" />
 <input type="submit" name="login_user" value="Sign in" tabindex="3" class="btn btn-dark btn-block" data-disable-with="Signing in…" />
      </div>
</form>

      <p class="create-account-callout mt-3" style="color:#fff;">
         <b>New to PayOnGo?</b>
        <a data-hydro-click="{&quot;event_type&quot;:&quot;authentication.click&quot;,&quot;payload&quot;:{&quot;location_in_page&quot;:&quot;sign in switch to sign up&quot;,&quot;repository_id&quot;:null,&quot;auth_type&quot;:&quot;SIGN_UP&quot;,&quot;client_id&quot;:null,&quot;originating_request_id&quot;:&quot;A2F2:0889:CA9D:11F60:5DC330D3&quot;,&quot;originating_url&quot;:&quot;https://my.softstack-research.co&quot;,&quot;referrer&quot;:null,&quot;user_id&quot;:null}}" data-hydro-click-hmac="2f0f0bdf805deaaa502889a239c7d4a471b766cb725b5918108adbe21f96a0dc" data-ga-click="Sign in, switch to sign up" href="signup.php?source=login">Create an account</a>.
      </p>
</div>
</div>
      </main>
 <script type="application/javascript" src="http://my.softstack-research.co/assets/bootstrap.js"></script>
    <script type="application/javascript" src="http://my.softstack-research.co/assets/framework.js"></script>
    <script type="application/javascript" src="http://my.softstack-research.co/assets/site.js"></script>
 <script type="application/javascript" src="https://my.softstack-research.co/assets/bootstrap.js"></script>
    <script type="application/javascript" src="https://my.softstack-research.co/assets/framework.js"></script>
    <script type="application/javascript" src="https://my.softstack-research.co/assets/site.js"></script>
 <div class="js-stale-session-flash flash flash-warn flash-banner" hidden>
    <svg class="octicon octicon-alert" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M8.893 1.5c-.183-.31-.52-.5-.887-.5s-.703.19-.886.5L.138 13.499a.98.98 0 000 1.001c.193.31.53.501.886.501h13.964c.367 0 .704-.19.877-.5a1.03 1.03 0 00.01-1.002L8.893 1.5zm.133 11.497H6.987v-2.003h2.039v2.003zm0-3.004H6.987V5.987h2.039v4.006z"/></svg>
    <span class="js-stale-session-flash-signed-in" hidden>You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
    <span class="js-stale-session-flash-signed-out" hidden>You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
  </div>
  <template id="site-details-dialog">
  <details class="details-reset details-overlay details-overlay-dark lh-default text-gray-dark hx_rsm" open>
    <summary role="button" aria-label="Close dialog"></summary>
    <details-dialog class="Box Box--overlay d-flex flex-column anim-fade-in fast hx_rsm-dialog hx_rsm-modal">
      <button class="Box-btn-octicon m-0 btn-octicon position-absolute right-0 top-0" type="button" aria-label="Close dialog" data-close-dialog>
        <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"/></svg>
      </button>
      <div class="octocat-spinner my-6 js-details-dialog-spinner"></div>
    </details-dialog>
  </details>
</template>

  <div class="Popover js-hovercard-content position-absolute" style="display: none; outline: none;" tabindex="0">
  <div class="Popover-message Popover-message--bottom-left Popover-message--large Box box-shadow-large" style="width:360px;">
  </div>
</div>
<div aria-live="polite" class="js-global-screen-reader-notice sr-only"></div>
</div>
</body>
</html>
