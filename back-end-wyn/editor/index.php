<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Documento sin título</title>
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		editor_deselector : "descri",
		mode : "textareas",
		theme : "advanced",
		plugins : "imgsurfer,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,forecolor,backcolor,cut,copy,paste,pastetext,pasteword,bullist,numlist,|,outdent,indent,link,unlink",
			theme_advanced_buttons2 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,undo,redo",
			theme_advanced_buttons3 : "formatselect,fontselect,fontsizeselect,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen,imgsurfer,image",

		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : false,
		// Example content CSS (should be your site CSS)
	});
</script>
<!-- /TinyMCE -->
</head>

<body>
<p>
  <label for="textarea"></label>
  <textarea name="textarea" id="textarea"></textarea>
</p>
</body>
</html>