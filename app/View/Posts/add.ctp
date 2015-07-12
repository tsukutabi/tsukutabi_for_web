<style>
    .postaddmainh2{
        text-align: center;
        font-size: medium;
    }

    body{
        font: 13px Verdana;
        background: #eee;
        color: #333
    }
</style>
<?php echo $this->Html->css('jquery.ui.plupload.css'); ?>
<nav class="navbar navbar-default"><h2 class="postaddmainh2">旅行記を作成して下さい。</h2></nav>


<pre id="console"></pre>

<?php echo $this->Html->script(array('jQuery.js','plupload.full.min.js','jquery.ui.plupload.js')); ?>


<!--<form id="form" id="upload-form" method="post" enctype="multipart/form-data" onSubmit="return upload(this);">-->
<!--&lt;!&ndash;<div id="uploader">&ndash;&gt;-->
    <!--&lt;!&ndash;<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->


    <!--<input type="file" name="files[]" multiple>-->
    <!--<input type="submit" value="Submit" />-->
<!--</form>-->


<form id="upload-form" method="post" enctype="multipart/form-data" onSubmit="return upload(this);">
    <input id="upload-form-file" name="userfile[]" size="27" type="file" accept="image/*;capture=camera" multiple/>
    <br />
    <input type="file" multiple name="userfile[]" id="new[1]">
    <br />
    <input type="submit" name="submit" value="OK" />
</form>

<script type="text/javascript">
    // Initialize the widget when the DOM is ready
    $(function() {
        $("#uploader").plupload({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : "localhost/cakephp/posts/imgadd/",

            // Maximum file size
            max_file_size : '2mb',

            chunk_size: '1mb',

            // Resize images on clientside if we can
            resize : {
                width : 200,
                height : 200,
                quality : 90,
                crop: true // crop to exact dimensions
            },

            // Specify what files to browse for
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip,avi"}
            ],

            // Rename files by clicking on their titles
            rename: false,

            file_data_name:"Img[]",

            // Sort files
            sortable: true,

            // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
            dragdrop: true,

            // Views to activate
            views: {
                list: true,
                thumbs: true, // Show thumbs
                active: 'thumbs'
            },

            // Flash settings
            flash_swf_url : '/plupload/js/Moxie.swf',

            // Silverlight settings
            silverlight_xap_url : '/plupload/js/Moxie.xap'



        });

//        $('#form').submit(function(e) {
//            // Files in queue upload them first
//            if ($('#uploader').plupload('getFiles').length > 0) {
//
////                // When all files are uploaded submit form
//                $('#uploader').on('complete', function() {
//                    $('#form')[0].submit();
//                });
//
////                $form = $('#form');
////                fd = new FormData($form[0]);
////                console.log(fd);
////                $.ajax
////                ('localhost/cakephp/posts/imgadd/',
////                {
////                    type: 'post',
////                    processData: false,
////                    contentType: false,
////                    data: fd,
////                    dataType: "json",
////                    success: function(data) {
////                        alert( data.message );
////                        console.log(data);
////                    },
////                    error: function(XMLHttpRequest, textStatus, errorThrown) {
////                        console.log(fd);
////                        console.log( "ERROR" );
////                        console.log( textStatus );
////                        console.log( errorThrown );
////                    }
////                });
////                $('#uploader').plupload('start');
//            } else {
//                alert("You must have at least one file in the queue.");
//            }
//            return false; // Keep the form from submitting
//        });
    });


    function upload(form) {
        $form = $('#upload-form');
        fd = new FormData($form[0]);
        $.ajax(
                'loaclhost/cakephp/posts/imgadd/',
                {
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: fd,
                    dataType: "json",
                    success: function(data) {
                        alert( data.message );
                        console.log(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert( "ERROR" );
                        alert( textStatus );
                        alert( errorThrown );
                    }
                });
        return false;
    }

</script>