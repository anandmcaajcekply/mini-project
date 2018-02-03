<html>
<head>

</head>
<body>

    <button id="3">Click me to disable</button>


</body>
<script>
  $(document).ready(function() {
  $(document).on("click", "#your-buttons-id", function() {
    $(this).prop("disabled", true);
  });
});
</script>
</html>
