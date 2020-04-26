<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 - Ajax Image Uploading Tutorial</title>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="http://malsup.github.com/jquery.form.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<div class="container">
  <h1>Laravel 6 - Ajax Image Uploading Tutorial</h1>
  <form enctype="multipart/form-data" id="uploadImage" method="POST">
  	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    @csrf
 	  <div class="form-group">
      <label>Image:</label>
      <input type="file" id="image" name="image_path" class="form-control">
    </div>
    <div class="form-group">
      <button class="btn btn-success upload-image">Upload Image</button>
    </div>
  </form>
</div>

<script type="text/javascript">
     $('#uploadImage').on('submit',function(event){
        event.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
          url: "/save-image",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          // contentType: false,
          // processData: false,
          success:function(response){
            console.log(response);
          },
         });
      });

</script>
</body>
</html>
