document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
  
    var form = event.target;
    var formData = new FormData(form);
  
    // Send form data using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        alert(xhr.responseText); // Show response from server
        form.reset(); // Clear the form
      } else {
        alert('Error: ' + xhr.status);
      }
    };
    xhr.send(formData);
  });
  