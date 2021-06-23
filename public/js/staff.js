(function($){
    function staffSectionToggle($section, $opener = NULL){
        let state = parseInt($section.attr('data-state'));
        if(state == 0){
            $section.slideDown(600).attr('data-state', 1);
            $opener.find('i').removeClass('fa-arrow-right').addClass('fa-arrow-down');
        }else{
            $section.slideUp(600).attr('data-state', 0);
            $opener.find('i').removeClass('fa-arrow-down').addClass('fa-arrow-right');
        }
    }
    $('h3.staff-section-opener').click(function(){
        staffSectionToggle($('section#'+$(this).attr('data-section')), $(this));
    });
    $('.staff-section').each(function(){
        staffSectionToggle($(this));
    })
})(jQuery);