// post用の非同期通信

function upload(form) {
            $form = $('#upload-form');
            fd = new FormData($form[0]);
            $.ajax(
                'http://tsukutabi.raindrop.jp/testnews/posts/imgadd',
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
                error: function(XMLHttpRequest, textStatus, errorThrown){ location.href = "<?php echo""?>/testnews/posts/"
                    console.log( "ERROR" );
                    console.log( textStatus );
                    console.log( errorThrown );
                }
            });
            return false;
        }