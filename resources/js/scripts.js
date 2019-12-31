$(document).ready(function() {
    // on page load, push to history
    history.pushState('list[all]', null, '');

    $('.mobile-menu-button--open').on('click', function(e) {
        openMenu();
    });

    $('.mobile-menu-button--close').on('click', function(e) {
        closeMenu();
    });
    $('.mobile-menu-background').on('click', function(e) {
       closeMenu();
    });
});

window.addEventListener("popstate", function(e) {
    var type;
    var id;

    if (e.state == null) {
        type = 'list';
        id = 'all';
    } else {
        var re = '^(\\w+)\\[(.+)]$';
        var match = e.state.match(re);

        type = match[1];
        id = match[2];
    }

    if (type === 'list') {
        listProjects(id);
    } else if (type === 'get') {
        getProject(id);
    }
});

function openMenu() {
    $('nav').css('left', '0');
    $('.mobile-menu-background').fadeIn();
}
function closeMenu() {
    $('nav').css('left', '-300px');
    $('.mobile-menu-background').fadeOut();
}
