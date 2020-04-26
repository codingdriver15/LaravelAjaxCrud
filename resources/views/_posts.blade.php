<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Ajax CRUD Example Tutorial with - CodingDriver</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script></head>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script></head>
  <style>
  .alert-message {
    color: red;
  }
</style>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Laravel Ajax CRUD Application -
       <a href="https://www.codingdriver.com" target="_blank" >CodingDriver</a>
     </h2><br>
     <div class="row">
       <div class="col-12 text-right">
         <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Add Post</a>
       </div>
    </div>
    <div class="row">
        <div class="col-12">
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Description</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($posts as $post)
              <tr id="row_{{$post->id}}">
                 <td>{{ $post->id  }}</td>
                 <td>{{ $post->title }}</td>
                 <td>{{ $post->description }}</td>
                 <td><a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td>
                 <td>
                  <a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td>
              </tr>
              @endforeach
           </tbody>
          </table>
       </div>
    </div>
</div>
<div class="modal fade" id="post-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <form name="userForm" class="form-horizontal">
               <input type="hidden" name="post_id" id="post_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">title</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                        <span id="titleError" class="alert-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="4" cols="50">
                        </textarea>
                        <span id="descriptionError" class="alert-message"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
        </div>
    </div>
  </div>
</div>
</body>

<script>
  $(document).ready(function() {
      $('#laravel_crud').DataTable( {
          responsive: true
      } );
  } );

  function addPost() {
    $('#post-modal').modal('show');
  }

  function editPost(event) {
    var id  = $(event).data("id");
    let _url = `/posts/${id}`;
    $('#titleError').text('');
    $('#descriptionError').text('');

    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#post_id").val(response.id);
            $("#title").val(response.title);
            $("#description").val(response.description);
            $('#post-modal').modal('show');
          }
      }
    });
  }

  function createPost() {
    var title = $('#title').val();
    var description = $('#description').val();
    var id = $('#post_id').val();

    let _url     = `/posts`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: "POST",
        data: {
          id: id,
          title: title,
          description: description,
          _token: _token
        },
        success: function(response) {
            if(response.code == 200) {
              if(id != ""){
                $("#row_"+id+" td:nth-child(2)").html(response.data.title);
                $("#row_"+id+" td:nth-child(3)").html(response.data.description);
              } else {
                $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.title+'</td><td>'+response.data.description+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
              }
              $('#title').val('');
              $('#description').val('');

              $('#post-modal').modal('hide');
            }
        },
        error: function(response) {
          $('#titleError').text(response.responseJSON.errors.title);
          $('#descriptionError').text(response.responseJSON.errors.description);
        }
      });
  }

  function deletePost(event) {
    var id  = $(event).data("id");
    let _url = `/posts/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          _token: _token
        },
        success: function(response) {
          $("#row_"+id).remove();
        }
      });
  }

</script>

</html>
