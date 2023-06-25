const clientId = 'smartsorting_' + Math.random().toString(16).substr(2, 8);
const host = "wss://sortingvision.cloud.shiftr.io:443";

const options = {
  username: "sortingvision",
  password: "xfpVUKlXaUBwGpEi",
  keepalive: 30,
  clientId: clientId,
  protocolId: 'MQTT',
  protocolVersion: 4,
  clean: true,
  reconnectPeriod: 1000,
  connectTimeout: 30 * 1000,
  rejectUnauthorized: false
}

const client = mqtt.connect(host, options);

client.on("connect", function () {
  client.subscribe('smart-sorting/#', { qos: 1 })
  document.getElementById("status").innerHTML = "Terhubung";
  document.getElementById("status").style.color = "blue";
})

client.on("offline", function () {
  document.getElementById("status").innerHTML = "Terputus";
  document.getElementById("status").style.color = "red";
})

client.on("error", function (err) {
  console.log(err)
  client.end()
})


client.on("message", function (topic, payload) {
  if (topic == "smart-sorting/data/sorting/tomats"){
    document.getElementById("tomats").innerHTML = payload.toString();
  }
  if (topic == "smart-sorting/data/sorting/tomata"){
    document.getElementById("tomata").innerHTML = payload.toString();
  }
  if (topic == "smart-sorting/data/sorting/tomatb"){
    document.getElementById("tomatb").innerHTML = payload.toString();
  }
  
})