
nn='1';

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
                headtoken = "ahhaha";
                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                if (up.runtime === 'html5' && chunk_size) {
                    progress.setChunkProgess(chunk_size);
                }
	$("#cuowu1").fadeOut();

            },
            'UploadProgress': function(up, file) {
			$("#pickfiles").hide();

                var progress = new FileProgress(file, 'fsUploadProgress');
                var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
                progress.setProgress(file.percent + "%", up.total.bytesPerSec, chunk_size);

            },
            'UploadComplete': function(up, file, info) {
			      
if(policyType == "oss"){
	$.post("includes/save.php",{ming:osskey},function(result){
					var ge=result.split(",");
					var key1 = ge[0];
					var leixing = ge[1];
					var re = ge[2];
if(re=="bad"){$("#su").hide();
          	$("#cuowu").fadeIn();
			
		
	}else{						
if (leixing == "png" || leixing == "jpg" || leixing == "gif" || leixing == "jpeg" || leixing == "bmp" || leixing == "PNG" || leixing == "JPG" || leixing == "GIF" || leixing == "JPEG" || leixing == "BMP"){
				
						window.location.href = 'views/pic.php?key='+key1;
				
				}else if (leixing == "swf" || leixing == "SWF"){
					window.location.href = 'views/else.php?key='+key1;
					}else if (leixing == "mp3" || leixing == "wav" || leixing == "MP3" || leixing == "WAV" || leixing == "oga" || leixing == "OGA" || leixing == "m4a" || leixing == "M4A"){
						window.location.href = 'views/mp3.php?key='+key1;
			}else if (leixing == "flv" || leixing == "FLV" || leixing == "mp4" || leixing == "MP4" || leixing == "m3u8" || leixing == "M3U8" || leixing == "webm" || leixing == "WEBM" || leixing == "ogg" || leixing == "OGG"){
						window.location.href = 'views/video.php?key='+key1;
			}else{
							
								window.location.href = 'views/else.php?key='+key1;}
			}
   
   
   
    });
}

            },
            'FileUploaded': function(up, file, info) {
	




var progress = new FileProgress(file, 'fsUploadProgress');
progress.setComplete(up, info);





            },
            'Error': function(up, err, errTip) {
	$("#pickfiles").show();

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