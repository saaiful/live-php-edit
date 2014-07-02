<!DOCTYPE html>
<html>
<head>
	<title>Live PHP Editor</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/ace.js" type="text/javascript" charset="utf-8"></script>
    <style type="text/css">
    body{padding:0px;margin: 0px;}
    	#editor{
    		width:100%; 
    		position: fixed;
    		left: 0px;
    		bottom: 0px;
    	}
    	#output{width:100%; position: relative;}
    	#runframe{width:100%;left:0px; border: 0px; right: 0px;overflow-y: scroll;}
    	.submitform{
    		width: 100%;
			position: absolute;
			z-index: 10;
			top: 1px;
			right: 4px;
		}
		.runbutton{		    
			right: 0px;
		    float: right; 
			background-color: green;
		}
    </style>
</head>
<body>

	<div id="output">

		<div class="submitform">
			<form method="POST" action="run.php" target="run-code">
			<textarea name="code" class="text" id="mycode"></textarea>
			<input type="submit" value="run" class="runbutton">
			</form>
		</div>
		
		<iframe name="run-code" id="runframe" src="run.php"></iframe>
	</div>

	<div id="editor"></div>
	<script>
	$(".text").hide();
	var height = $(document).height();
	$("#output").height( height/2 );
	$("#editor").height( height/2 );
	$("#runframe").height( height/2 );
	$( window ).resize(function() {
		var height = $(document).height();
		$("#output").height( height/2 );
		$("#editor").height( height/2 );
		$("#runframe").height( height/2 );
	});
	
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/merbivore");
        editor.getSession().setMode("ace/mode/php");
        editor.getSession().setValue("<?php ?>");
        editor.getSession().on('change', function(e) {
		var code = editor.getSession().getValue();
		$('#mycode').val(code);
		}); 
    </script>
</body>
</html>

