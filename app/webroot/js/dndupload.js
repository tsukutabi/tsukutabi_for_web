$(function() {
	//ドロップされた場合
	$('.dropzone').on('drop', function(dropevent) {
		var files = dropevent.originalEvent.dataTransfer.files;
		if(files.length == 0) { return true; }

		var formData = new FormData();
		for(var i=0; i<files.length; i++){
			formData.append('file[]', files[i]);
		}

		AjaxUpload(formData);

		return false;

	}).on('dragover', function() {
		return false;
	});


	//フォームから入力された場合
	$('form[enctype="multipart/form-data"]').submit(function() {
		var inputfile = $(this).find('input[type="file"]');
		if(inputfile.val() == '') { return false; }

		var formData = new FormData(this); //this＝$(this)[0]

		AjaxUpload(formData);

		//フォームの内容をクリアする。IE10では動かないらしい。replaceWithとCloneで書き換える案がある
		inputfile.val('');

		return false;
	});

});


function AjaxUpload(formData){
	$.ajaxQueue({ //$.ajax → $.ajaxQueueに書き換えてキューで処理できるようにする
		url : 'dndupload.php',
		type: 'POST',
		contentType: false,
		processData: false,
		data: formData,

		xhr : function(){ //進捗処理
			NProgress.start();//NProgress開始 (メモ: NProgress起動中はhtmlにnprogress-busyクラスが付与される)
			var XHR = $.ajaxSettings.xhr();
			if(XHR.upload){
				XHR.upload.addEventListener('progress',function(uploadevent){
					var progre = uploadevent.loaded/uploadevent.total;
					NProgress.set(progre); //NProgress 0～1の間を取る
					//console.log(progre*100 + "%");
				},false);
			}
			NProgress.done();//NProgress終了
			return XHR;
		},
			
		dataType: 'text', //レスポンスをtext形式で受け取る
		success: function(response) {
			$('textarea').append(response); //レスポンスをtextareaに追加
			console.log('アップロードに成功しました');
		},
		error: function(xhr, error) {
			alert('アップロードに失敗しました');
			console.log('アップロードに失敗しました');
		}
	});
}




/*! jQuery Ajax Queue - v0.1.2pre - 2013-03-19
* https://github.com/gnarf37/jquery-ajaxQueue
* Copyright (c) 2013 Corey Frang; Licensed MIT */
(function($) {

// jQuery on an empty object, we are going to use this as our Queue
var ajaxQueue = $({});

$.ajaxQueue = function( ajaxOpts ) {
    var jqXHR,
        dfd = $.Deferred(),
        promise = dfd.promise();

    // run the actual query
    function doRequest( next ) {
        jqXHR = $.ajax( ajaxOpts );
        jqXHR.done( dfd.resolve )
            .fail( dfd.reject )
            .then( next, next );
    }

    // queue our ajax request
    ajaxQueue.queue( doRequest );

    // add the abort method
    promise.abort = function( statusText ) {

        // proxy abort to the jqXHR if it is active
        if ( jqXHR ) {
            return jqXHR.abort( statusText );
        }

        // if there wasn't already a jqXHR we need to remove from queue
        var queue = ajaxQueue.queue(),
            index = $.inArray( doRequest, queue );

        if ( index > -1 ) {
            queue.splice( index, 1 );
        }

        // and then reject the deferred
        dfd.rejectWith( ajaxOpts.context || ajaxOpts, [ promise, statusText, "" ] );
        return promise;
    };

    return promise;
};

})(jQuery);

