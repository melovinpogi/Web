<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo form_open_multipart('upload/do_upload');?>


<input type="file" name="userfile" size="20" class="btn btn-default navbar-btn" />
<input type="submit" value="Upload" class="btn btn-default navbar-btn" id="bupload"/>

</form>

</body>
</html>