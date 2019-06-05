document.getElementById("name").innerHTML = getCookie("name");

$.ajax({
    data: 'id=' + getCookie("id")+"&score=" + totalScore,
    url: 'UpdateScore.php',
    method: 'POST',
    success: function (msg) {
      console.log("Score: " + totalScore + " para: " + getCookie("id"));
    }
  });