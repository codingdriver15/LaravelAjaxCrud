<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Multiple Files Upload Using Dropzone with - CodingDriver</title>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

</head>
  <style>
  .alert-message {
    color: red;
  }
</style>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Laravel Multiple Files Upload Using Dropzone -
       <a href="https://www.codingdriver.com" target="_blank" >CodingDriver</a>
     </h2>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <div class="dropzone" id="file-dropzone"></div>
        </div>
    </div>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

<script>
Dropzone.options.fileDropzone = {
  url: '{{ route('file.store') }}',
  acceptedFiles: ".jpeg,.jpg,.png,.gif",
  addRemoveLinks: true,
  maxFilesize: 8,
  headers: {
  'X-CSRF-TOKEN': "{{ csrf_token() }}"
  },
  removedfile: function(file)
  {
    var name = file.upload.filename;
    $.ajax({
      type: 'POST',
      url: '{{ route('file.remove') }}',
      data: { "_token": "{{ csrf_token() }}", name: name},
      success: function (data){
          console.log("File has been successfully removed!!");
      },
      error: function(e) {
          console.log(e);
      }});
  },
  success: function (file, response) {
    console.log(file);
  },
}
</script>

</html>
