function handleLogin() {
  $.ajax({
    url: "http://Simonita.site/api/login.php",
    method: "POST",
    data: $("#formLogin").serialize(),
    // dataType: "json",
    success: function (response) {
      // Respons berhasil diterima
      if (response.status) {
        console.log(response);
        alert(response.data.message);
        window.location.reload();
      } else {
        // Respons gagal
        // alert(response.data.message);
      }
    },
    error: function (xhr, status, error) {
      alert("Error: " + error);
    },
  });
}
