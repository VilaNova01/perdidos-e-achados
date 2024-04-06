<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Controle de Perdidos e Achados</title>
<link rel="stylesheet" href="styles.css">

<style>
#conteudo{
display: flex;
font-weight: bold;
}

#conteudo div{
padding: 10%;

}
#conteudo .d1{
background-color: brown;
position: relative;
}
#conteudo .d2{
background-color: blue;
position: relative;
}
#conteudo .d3{
background-color: yellow;
position: relative;
}
#conteudo .d4{
background-color: black;
position: relative;
}
#conteudo .d5{
background-color: gray;
position: relative;

}
#conteudo .d6{
background-color: green;
position: relative;
}
#conteudo .d7{
background-color: purple;
position: relative;
}
#conteudo .d8{
background-color: red;
position: relative;
}
#conteudo .d9{
background-color: orangered;
position: relative;
}
#conteudo .d10{
background-color: darksalmon;
position: relative;

}
</style>
</head>
<body>

<h1 id="titulo">ola pessoal</h1>



<div id="conteudo">

<div id="item" class="d1">
1
</div>
<div id="item" class="d2">
2
</div>
<div id="item" class="d3">
3
</div>
<div id="item" class="d4">
4
</div>
<div id="item" class="d5">
5
</div>
<div id="item" class="d6">
6
</div>
<div id="item" class="d7">
7
</div>
<div id="item" class="d8">
8
</div>
<div id="item" class="d9">
9
</div>
<div id="item" class="d10">
10
</div>
</div>

 <script>

  const myHeaders = new Headers();
myHeaders.append("Authorization", "App 145e8bf8155ab52e25b9de932bb0252b-49830d3b-4425-4a8b-b3f5-534deac9893b");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

const raw = JSON.stringify({
    "messages": [
        {
            "destinations": [{"to":"244930810346"}],
            "from": "ServiceSMS",
            "text": "LOST & FOUND,\n\n Ola, imformamos ao familhar que o seu ente querido possivelmente foi encontrado"
        }
    ]
});

const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
};

fetch("https://y3kzgp.api.infobip.com/sms/2/text/advanced", requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
  /*
  let item=document.getElementById("item")
    
  

  let i=0;
  let pexel;
  setInterval(
  function() {
    
    pexel=i.toString()+"px"
    item.style.marginRight=pexel
    i=i-5;
  }, 100
 )*/
 </script>
</body>
</html>