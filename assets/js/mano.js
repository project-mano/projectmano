window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-HBP5FBSQTD');

SmoothScroll('a[data-scroll]');

$('input#themeSwitch').on('change', function(e) {
    let theme = localStorage.theme;
    if (theme) {
    var toggleTo = theme === 'dark' ? 'light' : 'dark';
    toggleTo === 'dark' ? $('div[data-theme]').addClass('dark') : $('div[data-theme]').removeClass('dark');

    localStorage.setItem('theme', toggleTo);
    } else {
    localStorage.theme = false;
    }
});

function hideMsg() {
    setInterval(() => {
    $('#subMsg').addClass('hidden');
    }, 2500);
}

AOS.init({
    // disable: 'mobile',
    duration: 1000
});

$(document).ready(function() {

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    $('div[data-theme]').addClass('dark');
    $('input#themeSwitch').attr('checked', 'true');

    } else {
    $('div[data-theme]').removeClass('dark');
    }

});