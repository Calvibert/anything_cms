<script>
    import { fly, scale, slide } from 'svelte/transition';
    import { quintOut } from 'svelte/easing';
    import { writable } from 'svelte/store';
    import { getContext } from 'svelte';

    import routes, { mainRoute } from '../router.js';
    import Signup from './Registration/Signup.svelte';
    import Login from './Registration/Login.svelte';

    function select() {
        mainRoute.set(this.value);
    }

    // Facebook Login
    // FB.getLoginStatus(function(response) {
    //     console.log(response);
    //     // status: 'connected',
    //     // authResponse: {
    //     // accessToken: '...',
    //     // expiresIn:'...',
    //     // signedRequest:'...',
    //     // userID:'...'
    //     // }
    // });
    // function checkLoginState() {
    //     FB.getLoginStatus(function(response) {
    //         console.log(response);
    //         // statusChangeCallback(response);
    //     });
    // }
    // window.fbAsyncInit = function() {
    //     FB.init({
    //       appId      : '534218563854631',
    //       cookie     : true,
    //       xfbml      : true,
    //       version    : 'v5.0'
    //     });
    //     FB.AppEvents.logPageView();
    // };
    // (function(d, s, id){
    //     var js, fjs = d.getElementsByTagName(s)[0];
    //     if (d.getElementById(id)) {return;}
    //     js = d.createElement(s); js.id = id;
    //     js.src = "https://connect.facebook.net/en_US/sdk.js";
    //     fjs.parentNode.insertBefore(js, fjs);
    // }(document, 'script', 'facebook-jssdk'));
</script>

<style>
    h1 {
        color: #dbdbdb;
        margin: 0px;
    }
    .selected {
        color: #333;
    }
    button {
        background: #fafafa;
        border: none;
        margin: 0px;
    }
    .strike {
        display: block;
        text-align: center;
        overflow: hidden;
        white-space: nowrap; 
    }
    .strike > span {
        position: relative;
        display: inline-block;
    }
    .strike > span:before,
    .strike > span:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 9999px;
        height: 1px;
        background: #333;
    }
    .strike > span:before {
        right: 100%;
        margin-right: 15px;
    }
    .strike > span:after {
        left: 100%;
        margin-left: 15px;
    }
</style>

<!-- <div transition:fly="{{delay: 25, duration: 300, x: 0, y: 500, opacity: 0.5, easing: quintOut}}"> -->
<div transition:scale="{{duration: 300, delay: 0, opacity: 0, start: 0.25, easing: quintOut}}">
<!-- <div transition:slide="{{delay: 0, duration: 300, easing: quintOut}}"> -->
<table>
<tr>
<td>
    <button value="/login" on:click={select}>
        <h1 class="{$mainRoute === '/login' ? 'selected': ''}">Login&nbsp;&nbsp;</h1>
    </button>
</td>
<td>
    <button value="/signup" on:click={select}>
        <h1 class="{$mainRoute === '/signup' ? 'selected': ''}">Sign Up</h1>
    </button>
</td>
</tr>
</table>
{#if $mainRoute === '/login'}
<Login />
{:else}
<Signup />
{/if}


<!-- <fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button> -->

</div>

