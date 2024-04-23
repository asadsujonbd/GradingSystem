<script>
  $("button").click(function() {
    const name = (this.name);
    //const class_id = $(this).attr('data-class');
    const id = (this.value); // or alert($(this).attr('id'));
    console.log(name)
    console.log(id)
    switch (name) {
      case 'deleteSubject':
        console.log('subject', id)
        $.ajax({
          url: 'http://localhost:5000/subjects/' + id,
          type: 'DELETE',
          success: function(result) {
            // Do something with the result
            console.log(result)
            alert(result)
            window.location.reload()
          }
        });
        break;
      case 'deleteClass':
        console.log('class', id)
        $.ajax({
          url: 'http://localhost:5000/classes/' + id,
          type: 'DELETE',
          success: function(result) {
            // Do something with the result
            alert(result)
            window.location.reload()
            console.log(result)
          }
        });
        break;
      case 'deleteUser':
        console.log('user: ', id)
        $.ajax({
          url: 'http://localhost:5000/users/' + id,
          type: 'DELETE',
          success: function(result) {
            alert(result)
            window.location.reload()
          },
          error: function(request, error, responseText) {
            console.log(responseText);
            alert(" Can't do because: " + error);
          }
        });
        break;
      case 'deleteTest':
        const test_id = (this.value);
        console.log('test_id: ', test_id)

        $.ajax({
          url: 'http://localhost:5000/tests/' + test_id,
          type: 'DELETE',
          success: function(result) {
            alert(result)
            window.location.reload()
          },
          error: function(request, error, responseText) {
            console.log(responseText);
            alert(" Can't do because: " + error);
          }
        });
        break;
      case 'assignStudent':
        //let class_id = $(this).attr('data-class');
        console.log('user: ', id)
        console.log('class id: ', $(this).attr('data-class'))
        $.ajax({
          url: 'http://localhost:5000/classes/studentAssign/' + id + '/' + $(this).attr('data-class'),
          type: 'POST',
          success: function(result) {
            alert(result)
            window.location.reload()
          },
          error: function(request, error, responseText) {
            console.log(responseText);
            alert(" Can't do because: " + error);
          }
        });
        break;
      case 'deassignStudent':
        //let class_id = $(this).attr('data-class');
        console.log('user: ', id)
        console.log('class id: ', $(this).attr('data-class'))
        $.ajax({
          url: 'http://localhost:5000/classes/studentDeassign/' + id + '/' + $(this).attr('data-class'),
          type: 'POST',
          success: function(result) {
            alert(result)
            window.location.reload()
          },
          error: function(request, error, responseText) {
            console.log(responseText);
            alert(" Can't do because: " + error);
          }
        });

        break;
      case 'archiveSubject':
        const archiveSubject = $("#archiveSubject").val();
        const user_id = $("#user_id").val();
        const class_id = $("#class_id").val();
        console.log('subject id : ' + archiveSubject)
        $.ajax({
          type: 'POST',
          url: 'http://localhost:5000/subjects/archive/' + archiveSubject,
          crossDomain: true,
          data: {
            user_id: user_id,
            class_id: class_id
          },
          success: function(result) {
            console.log(result)
            alert(result)
            window.location.reload()
          }
        });

        break;

        // case 'editStudent':
        //   console.log('user: ',id)
        //   $.ajax({
        //     url: 'edit_student.php',
        //     type: 'POST',
        //     data: id,
        //     success: function(data) {
        //       alert(data);
        //       //location.href = 'edit_student.php';
        //     },
        //     error: function(xhr, status, error) {
        //       console.error(xhr);
        //       //location.href = 'edit_student.php';
        //     }
        //   });
        //   break;
      default:
        break;
    }

  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>