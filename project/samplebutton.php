<html>
<?php
?>
<head>
</head>
<body>
<script>
 $( "#bind" ).click(function() {
   $(this).attr("disabled", "disabled");
   $("#unbind").removeAttr("disabled");
});
$( "#unbind" ).click(function() {
     $(this).attr("disabled", "disabled");
     $("#bind").removeAttr("disabled");
});

</script>
<form>
<button id="bind">Bind Click</button>
<button id="unbind">Unbind Click</button>
</form>
</body>
</html>
