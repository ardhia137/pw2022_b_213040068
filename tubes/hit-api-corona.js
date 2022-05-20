var request = new XMLHttpRequest()

request.open('GET', 'https://apicovid19indonesia-v2.vercel.app/api/indonesia', true)
request.onload = function () {
  var data = JSON.parse(this.response);
  var terkonfirmasi = data.positif.toLocaleString();
  var dalam_perawatan = data.dirawat.toLocaleString();
  var meninggal = data.meninggal.toLocaleString();
  var sembuh = data.sembuh.toLocaleString();
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