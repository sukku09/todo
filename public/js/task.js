$(function(){

    // handle delete button click
    $('body').on('click', '.delete-btn', function(e) {
      e.preventDefault();
  
      // get the id of the todo task
      var id = $(this).attr('data-id');
  
      // get csrf token value
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
  
      // now make the ajax request
      $.ajax({
        'url': '/delete-task/' + id,
        'type': 'DELETE',
        headers: { 'X-CSRF-TOKEN': csrf_token }
      }).done(function() {
        console.log('Todo task deleted: ' + id);
        window.location = window.location.href;
      }).fail(function() {
        alert('something went wrong!');
      });
  
    });


        // update status
        $('body').on('click', '.update-status-btn', function(e) {
            e.preventDefault();
        
            // get the id of the todo task
            var id = $(this).attr('data-id');
        
            // get csrf token value
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
        
            // now make the ajax request
            $.ajax({
              'url': '/update/' + id,
              'type': 'PUT',
              headers: { 'X-CSRF-TOKEN': csrf_token }
            }).done(function() {
              console.log('Todo task deleted: ' + id);
              window.location = window.location.href;
            }).fail(function() {
              alert('something went wrong!');
            });
        
          });

  });