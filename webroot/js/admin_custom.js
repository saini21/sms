$(document).ready(function () {

    $('.active-deactive').click(function () {
        var _this = $(this);
        var model = _this.attr('data-model');
        var field = _this.attr('data-field');
        var id = _this.attr('id').split('_')[1];

        $.ajax({
            url: SITE_URL + "/admin/admins/changeStatus/",
            type: "POST",
            data: {model, field, id,},
            dataType: "json",
            success: function (response) {

                if (response.code == 200) {

                    _this.removeClass('g-brd-teal-v2 g-bg-teal-v2 g-brd-primary g-bg-primary');

                    if(response.data.new_status){
                        _this.addClass('g-brd-teal-v2 g-bg-teal-v2');
                        _this.html(_this.attr('data-active-text'));
                    } else {
                        _this.addClass('g-brd-primary g-bg-primary');
                        _this.html(_this.attr('data-inactive-text'));
                    }
                } else {
                    $().showFlashMessage("error", response.message);
                }
            }
        });
    });

});
