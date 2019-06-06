var params = {};

var parser = document.createElement('a');
parser.href = window.location.href;
var query = parser.search.substring(1);
var vars = query.split('&');

var highScore;

for (var i = 0; i < vars.length; i++) {
  var pair = vars[i].split('=');
  params[pair[0]] = decodeURIComponent(pair[1]);
}

var id = params.id;
var chll = params.ch;
var record = false;

if (chll!=null){
  console.log(chll);
  alert('Recorde para quebrar: ' + chll);
  record = true;
}

update_player_info();
update_rank();

function update_player_info() {
  $.ajax({
    data: 'id=' + id,
    method: 'GET',
    url: 'Retrieve_PlayerInfo.php',
    dataType: 'json',
    success: function (data, status) {
      document.cookie = 'id=' + id;
      highScore = data.userScore;
      document.getElementById('name').innerHTML = data.userName;
      document.getElementById('high_score').innerHTML = "HIGH SCORE: " + data.userScore;
    }
  });
}

function update_rank(){
  $.ajax({
    data: 'id=' + id,
    method: 'GET',
    url: 'Retrieve_Top4.php',
    dataType: 'json',
    success: function (data, status) {
      console.log(data);

      for (var i = 0; i < 4; i++){

        var div = document.createElement("DIV");
        div.setAttribute("style","rank_panel");
        document.getElementById('rank').appendChild(div);

        var item = document.createElement("IMG");
        item.setAttribute("src", "http://graph.facebook.com/" + data[i].userId + "/picture?type=normal");
        var label = document.createElement("LABEL");
        var info = document.createTextNode(data[i].nickName + " fez um highscore de: "+ data[i].playerScore);
        label.appendChild(info);

        div.appendChild(item);
        div.appendChild(label);
        document.getElementById('rank').appendChild(document.createElement("BR"));

      }
    }
  });
}

function share(){
  FB.ui({ 
    method: 'feed',
    link: 'https://www.localhost/index.html?chll=' + highScore,
    function (resp) {
      if (resp.erro_message){
        console.log('foi');
      }
      else{

      }
    }
   });
}

function compare(actual){
  if (!record)
    return;

    if (actual > chll){
      alert('VOCÊ QUEBROU O RECORDE!!!');
      record = false;
    }
}