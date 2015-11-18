var directoryObject = {
	offsetY : 10,
	offsetX : 10,
	classTooltip : 'tooltip',
	idTooltip : 'preview',
	allowedExt : ['png', 'gif', 'jpg'],
	goIn : function(obj) {
		var ul = obj.closest('ul');
		var path = ul.attr('rel');
		var folder = obj.attr('rel');
		jQuery.post('/mod/in.php', { path : path, folder : folder }, function(data) {
			ul.replaceWith(data.out);
			directoryObject.getFiles();
		}, 'json');
	},
	goUp : function(obj) {
		var ul = obj.closest('ul');
		var path = ul.attr('rel');
		jQuery.post('/mod/up.php', { path : path }, function(data) {
			ul.replaceWith(data.out);
			directoryObject.getFiles();
		}, 'json');
	},
	getFiles : function() {
		var ul = $('#structure');
		var arr = ul.children('li');
		jQuery.each(arr, function() {
			var attr = $(this).attr('rel');
			if (typeof attr === 'undefined' || attr === false) {
				var path = ul.attr('rel');
				path = path.substring(1, path.length);
				var file = $(this).text();
				$(this).html('<a href="'+path+'/'+file+'" target="_blank" class="'+directoryObject.classTooltip+'">'+file+'</a>');
			}
		});		
	},
	preview : function() {
		$('a.'+directoryObject.classTooltip).live('mouseover mouseout mousemove', function(obj) {
			
			var file = $(this).text();
			var extension = file.split('.').pop();
			if (jQuery.inArray(extension, directoryObject.allowedExt) !== -1) {
				if (obj.type == 'mouseover') {
					var path = $(this).closest('ul').attr('rel')+'/'+file;
					$('body').append('<div><img src="'+path+'" id="'+directoryObject.idTooltip+'" alt="Preview" /></div>');
					$('#'+directoryObject.idTooltip)
						.css('top', (obj.pageY - directoryObject.offsetX) + 'px')
						.css('left', (obj.pageX - directoryObject.offsetY) + 'px')
						.fadeIn(100);
				} else if (obj.type == 'mouseout') {
					$('#'+directoryObject.idTooltip).remove();
				} else {
					$('#'+directoryObject.idTooltip)
						.css('top', (obj.pageY - directoryObject.offsetX) + 'px')
						.css('left', (obj.pageX + directoryObject.offsetY) + 'px');
				}
			}
			
		});
	}
};
$(function() {

	directoryObject.getFiles();
	directoryObject.preview();

	$('.folder').live('click', function() {
		directoryObject.goIn($(this));
		return false;
	});
	
	$('.folder-up').live('click', function() {
		directoryObject.goUp($(this));
		return false;
	});

});








