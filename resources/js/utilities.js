import jQuery from 'jquery';
window.$ = jQuery;

let isOpenMenu = false;

// Show User menu options
$('body').on('click','#user_profile_btn', () => {
    isOpenMenu = !isOpenMenu;
    var optionMenu = $('#logout_box');

    (isOpenMenu) ? optionMenu.hide() : optionMenu.fadeIn();
});