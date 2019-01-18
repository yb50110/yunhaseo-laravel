$(document).ready(function() {
    $('.project-description p img').unwrap();

    $('.project-thumbnail').click(function() {
        $('.project-thumbnail-enlarged').fadeIn();
        $('body').css('overflow', 'hidden');
    });
    $('.project-thumbnail-enlarged .background').click(function() {
        $('.project-thumbnail-enlarged').fadeOut();
        $('body').css('overflow', 'initial');
    });
});