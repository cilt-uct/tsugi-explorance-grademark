<?php class_exists('Template') or exit; ?>
<?php foreach($scripts as $script): ?>
    <script src="<?php echo $script ?>" type="text/javascript"></script>
<?php endforeach; ?>

<script type="text/javascript">
    jQuery.fn.exists = function(){ return this.length > 0; }

    // function testPath(url, callback, display = false) {
    //     let id = url.replace(/\//g, '_');
    //     $('.d2l-page-main-padding').append(`<div id="${id}">Loading ...</div>`);
    //     $.ajax({
    //         url: `<?php echo $get_url ?>&path=${url}`,
    //         type: 'GET',
    //         dataType: 'json',
    //         success: function(response) {
    //             if (response.success) {
    //                 body = display ? '<pre>' + JSON.stringify(response, null, 2) + '</pre>' : '';
    //                 $(`#${id}`).html('<div class="alert alert-success">Success ' + id + ': ' + response.msg + body + '</div>');

    //                 if (callback && typeof callback === 'function') {
    //                     callback(response);
    //                 }
    //             } else {
    //                 $(`#${id}`).html('<div class="alert alert-danger">Error: ' + response.msg + '</div>');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             $(`#${id}`).html('<div class="alert alert-danger">AJAX Error: ' + error + '</div>');
    //         }
    //     });
    // }

    $(function() {

    });
</script>
