$(document).ready(function() {


	var jcrop_api;
	var d = document, ge = 'getElementById';
	
	
	function avatarJcrop($init)
	{
		  // Most basic attachment example
		  $('.avatar-item .avatar-uploader').Jcrop({
			  setSelect:[ 0, 0, 200, 200 ],
			  minSize:[100,100],
			  boxWidth: "400",
			  aspectRatio:1
		  }, function() {
	        jcrop_api = this;
	        var thumbnail = this.initComponent('Thumbnailer', {
	            width: 200,
	            height: 200,
	        });
	        thumbnail.element.attr("style","top:0px;width:200px;height:200px");
	        
	        var thumbnail1 = this.initComponent('Thumbnailer', {
	            width: 96,
	            height: 96
	        });
	        thumbnail1.element.attr("style","top:220px;width:96px;height:96px");
	        
	        var thumbnail2 = this.initComponent('Thumbnailer', {
	            width: 24,
	            height: 24
	        });
	        thumbnail2.element.attr("style","top:340px;width:24px;height:24px");
	        
	    });
		  
		if($init)
		{
			jcrop_api.setOptions({ allowSelect: false });
			jcrop_api.ui.selection.remove();
		}

	}
	
	avatarJcrop(true);
	
	 $('.avatar-item').on('cropmove cropend',function(e,s,c){
		    d[ge]('crop-x').value = c.x;
		    d[ge]('crop-y').value = c.y;
		    d[ge]('crop-w').value = c.w;
		    d[ge]('crop-h').value = c.h;
		  });
	
	$("#uploadFileInput").fileupload({
		url : uploadUrl,
		done : function(e, data) {
			$.each(data.result.files, function(index, file) {
				if (!file.error) {
					 $(".avatar-item").html($('<img/>', {
						src : file.url,
						"class" : "avatar-uploader"
					}));
					 $(".avatar-item").append($('<input/>', {"name": 'avatar-path',"value": file.id, "type":"hidden"}))
					avatarJcrop();
				} else {
					notify.error(file.errors)
				}

			});
		}
	});
	
	
	$("form.avatar-form").submit(function(event) {
		
        event.preventDefault();
        event.stopImmediatePropagation();
        
    	var avatar = $("input[name='avatar-path']").val();
		if(!avatar)
		{
			return false;
		}
        
		var url = $(this).attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: {
                x: $('#crop-x').val(),
                y: $('#crop-y').val(),
                w: $('#crop-w').val(),
                h: $('#crop-h').val(),
                avatar:avatar
            },
            success: function(msg) {
                location.reload();
            }
        });
        return false;
    });
	
});
