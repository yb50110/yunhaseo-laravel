$(document).ready(function() {
    // on page load, push to history
    history.pushState('list[all]', null, '');

    // // check if extra info in url and show appropriate content
    // if (window.location.pathname !== '/') {
    //     console.log('yo');
    //     var re = '\\/(\\w+)-(.+)';
    //     var match = window.location.pathname.match(re);
    //
    //     var type = match[1];
    //     var id = match[2];
    //
    //     if (type === 'list') {
    //         listProjects(id);
    //     } else if (type === 'get') {
    //         getProject(id);
    //     }
    // }
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
