$(function() {
    $("#check_all").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='row-check']").prop("checked", true);
        } else {
            $("input:checkbox[name='row-check']").prop("checked", false);
        }
    });

    $("input:checkbox[name='row-check']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='row-check']").length;
        var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

        if (total_check_boxes === total_checked_boxes) {
            $("#check_all").prop("checked", true);
        }
        else {
            $("#check_all").prop("checked", false);
        }
    });

    $('#export').click(function() {
        let url = $(this).data('href');
        let posts = []
        if($("input:checkbox[name='row-check']:checked").length > 0)
        {
            $('#posts').find('input[type="checkbox"]:checked').each(function () {
                posts.push($(this).val())
            })
            if($('#check_all').prop('checked') == true) {
                posts = $.grep(posts, function(value) {
                    return value != $('#check_all').val();
                });
            }
            url += '?id=' + posts
        }
        window.location.href = url;
    });
});
