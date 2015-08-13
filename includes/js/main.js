nn='1',
$(function() {

    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
		    domain: 'http://sdcc.qiniudn.com/',
        browse_button: 'pickfiles',
        container: 'uu',
        drop_element: 'laru',
        unique_names: autoname,
        flash_swf_url: 'js/plupload/Moxie.swf',
        dragdrop: true,
        chunk_size: fp+"mb",
		uptoken_url: 'includes/token.php',
multi_selection: false, 
filters : {
// Maximum file size
max_file_size : max+"mb",
// Specify what files to browse for
mime_types: [
{title : "All files", extensions : min},

]
},



        auto_start: true,
        init: {
            'FilesAdded': function(up, files) {

                $('table').show();

                plupload.each(files, function(file) {
                     
				   var progress = new FileProgress(file, 'fsUploadProgress');
                   progress.setStatus("");
				     $('#shuo').hide();  
					     $('#kongge').show();  
				 
				
					
                });
            },
            'BeforeUpload': function(up, file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                if (up.runtime === 'html5' && chunk_size) {
                    progress.setChunkProgess(chunk_size);
                }
	$("#cuowu1").fadeOut();

            },
            'UploadProgress': function(up, file) {
			
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                progress.setProgress(file.percent + "%", up.total.bytesPerSec, chunk_size);

            },
            'UploadComplete': function(up, file, info) {
			      $('hide').show();
             	$("#su").fadeIn();


            },
            'FileUploaded': function(up, file, info) {
	




var progress = new FileProgress(file, 'fsUploadProgress');
progress.setComplete(up, info);





            },
            'Error': function(up, err, errTip) {
	
                $('table').show();
                var progress = new FileProgress(err.file, 'fsUploadProgress');
                progress.setError();
				      nn=nn+1,
err1(errTip);
progress.setStatus("");


            }
          
        }
    });

    uploader.bind('FileUploaded', function() {
        console.log('hello man,a file is uploaded');
    });
    $('#container').on(
        'dragenter',
        function(e) {
            e.preventDefault();
            $('#container').addClass('draging');
            e.stopPropagation();
        }
    ).on('drop', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragleave', function(e) {
        e.preventDefault();
        $('#container').removeClass('draging');
        e.stopPropagation();
    }).on('dragover', function(e) {
        e.preventDefault();
        $('#container').addClass('draging');
        e.stopPropagation();
    });





    });

		
     

function err1 (ree){
	$("#cuowu1").fadeIn();
	$("#errinfo").text(ree);
    $("#gc").hide();
      $(".ssz").hide();
	}