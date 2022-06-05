var request = new XMLHttpRequest()

// request.open('GET', 'https://apicovid19indonesia-v2.vercel.app/api/indonesia', true)
request.open('GET', 'http://localhost/pw2022_b_213040068/tubes/json-covid.js', true)
request.onload = function () {
  var data = JSON.parse(this.response);
  // var terkonfirmasi = data.positif.toLocaleString();
  // var dalam_perawatan = data.dirawat.toLocaleString();
  // var meninggal = data.meninggal.toLocaleString();
  // var sembuh = data.sembuh.toLocaleString(); 
  
  var terkonfirmasi = data[0].positif;
  var dalam_perawatan = data[0].dirawat;
  var meninggal = data[0].meninggal;
  var sembuh = data[0].sembuh;
  if (request.status == 200) {
    document.getElementById("terkonfirmasi").innerHTML = terkonfirmasi;
    document.getElementById("dalam_perawatan").innerHTML = dalam_perawatan;
    document.getElementById("meninggal").innerHTML = meninggal;
    document.getElementById("sembuh").innerHTML =sembuh;
  } else {
    console.log('error')
  }
}
request.send()