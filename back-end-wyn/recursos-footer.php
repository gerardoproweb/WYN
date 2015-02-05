	<link rel="stylesheet" href="neon/assets/js/wysihtml5/bootstrap-wysihtml5.css" id="style-resource-1">
	<script src="neon/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="neon/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="neon/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="neon/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="neon/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="neon/assets/js/neon-api.js" id="script-resource-6"></script>
   	<script src="neon/assets/js/jquery.validate.min.js" id="script-resource-11"></script>
	<script src="neon/assets/js/bootstrap-switch.min.js" id="script-resource-7"></script>
	<script src="neon/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="neon/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="neon/assets/js/select2/select2.min.js" id="script-resource-9"></script>
	<script src="neon/assets/js/neon-custom.js" id="script-resource-9"></script>
	<script src="neon/assets/js/neon-demo.js" id="script-resource-10"></script>
	<script src="neon/assets/js/toastr.js" id="script-resource-7"></script>
	<link rel="stylesheet" href="neon/assets/js/select2/select2-bootstrap.css" id="style-resource-6">
	<link rel="stylesheet" href="neon/assets/js/select2/select2.css" id="style-resource-7">
	<script src="neon/assets/js/fileinput.js" id="script-resource-7"></script>
	<script src="neon/assets/js/dropzone/dropzone.js" id="script-resource-8"></script>
	<script src="neon/assets/js/bootstrap-tagsinput.min.js" id="script-resource-8"></script>
	<script type="text/javascript" src="editor/jscripts/tiny_mce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
		// General options
		
		mode : "textareas",
		selector : 'textarea',
		relative_urls:false,
		language : 'es_MX',
        forced_root_block : false, // !IMPORTANT
        force_br_newlines : true, // !IMPORTANT
        force_p_newlines : false, // !IMPORTANT
		//plugins : "responsivefilemanager,pagebreak,code,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,wordcount,advlist,autosave",
		plugins : "responsivefilemanager,pagebreak,code,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template,wordcount,advlist,autosave",
		

		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | code | link image responsivefilemanager",
		

		// file manager
		external_filemanager_path:"/filemanager/",
		filemanager_title:"Administrador de Archivos" ,
		external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},


		
	});
</script>

<!-- FOR ICON PICKER FONT AWESOME -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="dist/js/fontawesome-iconpicker.js"></script>
        <script>
            $(function() {
                
                $(document).ready(function(){
                    $('.icp-auto').iconpicker();
                
                    
                    $('.icp-opts').iconpicker({
                        title: 'With custom options',
                        icons: ['fa-github', 'fa-heart', 'fa-html5', 'fa-css3'],
                        selectedCustomClass: 'label label-success',
                        mustAccept: true,
                        placement: 'bottomRight',
                        showFooter: true,
                        // note that this is ignored cause we have an accept button:
                        hideOnSelect: true,
                        templates: {
                            footer: '<div class="popover-footer">' +
                                    '<div style="text-align:left; font-size:12px;">Placements: \n\
                    <a href="#" class=" action-placement">inline</a>\n\
                    <a href="#" class=" action-placement">topLeftCorner</a>\n\
                    <a href="#" class=" action-placement">topLeft</a>\n\
                    <a href="#" class=" action-placement">top</a>\n\
                    <a href="#" class=" action-placement">topRight</a>\n\
                    <a href="#" class=" action-placement">topRightCorner</a>\n\
                    <a href="#" class=" action-placement">rightTop</a>\n\
                    <a href="#" class=" action-placement">right</a>\n\
                    <a href="#" class=" action-placement">rightBottom</a>\n\
                    <a href="#" class=" action-placement">bottomRightCorner</a>\n\
                    <a href="#" class=" active action-placement">bottomRight</a>\n\
                    <a href="#" class=" action-placement">bottom</a>\n\
                    <a href="#" class=" action-placement">bottomLeft</a>\n\
                    <a href="#" class=" action-placement">bottomLeftCorner</a>\n\
                    <a href="#" class=" action-placement">leftBottom</a>\n\
                    <a href="#" class=" action-placement">left</a>\n\
                    <a href="#" class=" action-placement">leftTop</a>\n\
                    </div><hr></div>'}
                    }).data('iconpicker').show();
                }).trigger('click');


                // Events sample:
                // This event is only triggered when the actual input value is changed
                // by user interaction
                $('.icp').on('iconpickerSelected', function(e) {
                    $('.lead .picker-target').get(0).className = 'picker-target fa-3x ' +
                            e.iconpickerInstance.options.iconBaseClass + ' ' +
                            e.iconpickerInstance.options.fullClassFormatter(e.iconpickerValue);
                });
            });
        </script>
        <!-- FOR ICON PICKER FONT AWESOME -->