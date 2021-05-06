"use strict";

// Class definition
var KTUppy = function () {
	const Tus = Uppy.Tus;
	const ProgressBar = Uppy.ProgressBar;
	const StatusBar = Uppy.StatusBar;
	const FileInput = Uppy.FileInput;
	const Informer = Uppy.Informer;

	// to get uppy companions working, please refer to the official documentation here: https://uppy.io/docs/companion/
	const Dashboard = Uppy.Dashboard;
	const Dropbox = Uppy.Dropbox;
	const GoogleDrive = Uppy.GoogleDrive;
	const Instagram = Uppy.Instagram;
	const Webcam = Uppy.Webcam;

	

	var initUppy5 = function(){
		// Uppy variables
        // For more info refer: https://uppy.io/
		var elemId = 'kt_uppy_5';
		var id = '#' + elemId;
		var $statusBar = $(id + ' .kt-uppy__status');
		var $uploadedList = $(id + ' .kt-uppy__list');
		var timeout;
		
		var uppyMin = Uppy.Core({
			debug: true, 
			autoProceed: true,
			showProgressDetails: true,
			restrictions: {
				maxFileSize: 1000000, // 1mb
				maxNumberOfFiles: 5,
				minNumberOfFiles: 1
			}
		});
		
		uppyMin.use(FileInput, { target: id + ' .kt-uppy__wrapper', pretty: false });
		uppyMin.use(Informer, { target: id + ' .kt-uppy__informer'  });

		// demo file upload server
		uppyMin.use(Tus, { endpoint: 'https://master.tus.io/files/' });
		uppyMin.use(StatusBar, {
			target: id + ' .kt-uppy__status',
			hideUploadButton: true,
			hideAfterFinish: false
		});

		$(id + ' .uppy-FileInput-input').addClass('kt-uppy__input-control').attr('id', elemId + '_input_control');
		$(id + ' .uppy-FileInput-container').append('<label class="kt-uppy__input-label btn btn-label-brand btn-bold btn-font-sm" for="' + (elemId + '_input_control') + '">Attach files</label>');
		
		var $fileLabel = $(id + ' .kt-uppy__input-label');

		uppyMin.on('upload', function(data) {
			$fileLabel.text("Uploading...");
			$statusBar.addClass('kt-uppy__status--ongoing');
			$statusBar.removeClass('kt-uppy__status--hidden');
			clearTimeout( timeout );
		});

		uppyMin.on('complete', function(file) {
			$.each(file.successful, function(index, value){
				var sizeLabel = "bytes";
				var filesize = value.size;
				if (filesize > 1024){
					filesize = filesize / 1024;
					sizeLabel = "kb";

					if(filesize > 1024){
						filesize = filesize / 1024;
						sizeLabel = "MB";
					}
				}					
				var uploadListHtml = '<div class="kt-uppy__list-item" data-id="'+value.id+'"><div class="kt-uppy__list-label">'+value.name+' ('+ Math.round(filesize, 2) +' '+sizeLabel+')</div><span class="kt-uppy__list-remove" data-id="'+value.id+'"><i class="flaticon2-cancel-music"></i></span></div>';
				$uploadedList.append(uploadListHtml);
			});

			$fileLabel.text("Add more files");		

			$statusBar.addClass('kt-uppy__status--hidden');
			$statusBar.removeClass('kt-uppy__status--ongoing');
		});

		$(document).on('click', id + ' .kt-uppy__list .kt-uppy__list-remove', function(){
			var itemId = $(this).attr('data-id');
			uppyMin.removeFile(itemId);
			$(id + ' .kt-uppy__list-item[data-id="'+itemId+'"').remove();
		});
	}

	var initUppy6 = function(){
		var id = '#kt_uppy_6';
		var options = {
			proudlyDisplayPoweredByUppy: false,
			target: id + ' .kt-uppy__dashboard',
			inline: false,
			replaceTargetContent: true,
			showProgressDetails: true,
			note: 'No filetype restrictions.',
			height: 470,
			metaFields: [
				{ id: 'name', name: 'Name', placeholder: 'file name' },
				{ id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
			],
			browserBackButtonClose: true,
			trigger: id + ' .kt-uppy__btn'
		}

		var uppyDashboard = Uppy.Core({ 
			autoProceed: true,
			restrictions: {
				maxFileSize: 1000000, // 1mb
				maxNumberOfFiles: 5,
				minNumberOfFiles: 1
			}
		});

		uppyDashboard.use(Dashboard, options);  
		uppyDashboard.use(Tus, { endpoint: 'https://master.tus.io/files/' });
		uppyDashboard.use(GoogleDrive, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		uppyDashboard.use(Dropbox, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		uppyDashboard.use(Instagram, { target: Dashboard, companionUrl: 'https://companion.uppy.io' });
		uppyDashboard.use(Webcam, { target: Dashboard });
	}

	return {
		// public functions
		init: function() {
			initUppy1();
			initUppy2();
			initUppy3();
			initUppy4();
			initUppy5();
			initUppy6();

			swal.fire({
				"title": "Notice", 
				"html": "Uppy demos uses <b>https://master.tus.io/files/</b> URL for resumable upload examples and your uploaded files will be temporarely stored in <b>tus.io</b> servers.", 
				"type": "info",
				"buttonsStyling": false,
				"confirmButtonClass": "btn btn-brand kt-btn kt-btn--wide",
				"confirmButtonText": "Ok, I understand",
				"onClose": function(e) {
					console.log('on close event fired!');
				}
			});
		}
	};
}();

KTUtil.ready(function() {	
	KTUppy.init();
});