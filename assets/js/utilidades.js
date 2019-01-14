// funcao para as mascaras dos inputs
$(document).ready( function() {
 jQuery(function($){
  $("#entPhone").mask("(99) 99999-9999");
  $("#cep").mask("99999-999");
  $("#entCnpj").mask("99.999.999/9999-99");
});
});

$(document).ready( function() {
 jQuery(function($){
  $("#entPhone").mask("(99) 99999-9999");});
  });


function onFileSelected(event) { //Carregar imagem selecionada pelo usuarios
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}
function checkPass() //Verificar se senha e confirmação de senha combinam
{ 
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('entPass');
    var pass2 = document.getElementById('entPassConf');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Senhas Combinam!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Senhas Não Combinam!"
    }
}

var input = 1;
function mais(campo) {
 
var valor =  "input "+input+" - "+campo+" <input class='form-control' type='text' name='objetivo[]' value='' ><br>";
var nova = document.getElementById("aqui");
var novadiv = document.createElement("div");
var nomediv = "div";
novadiv.innerHTML = " <b>Título da Ação<b/> "+input+" <input class='form-control' type='text' name='objetivo[]' value='' >";
nova.appendChild(novadiv);

var valor =  "input "+input+" - "+campo+" <textarea class='form-control' name='desc[]' value='' ><br>";
var nova = document.getElementById("aqui");
var novadiv = document.createElement("div");
var nomediv = "div";
novadiv.innerHTML = " Descrição "+input+" <textarea class='form-control' name='desc[]' value='' >";
nova.appendChild(novadiv);

var valor =  "input "+input+" - "+campo+" <br><legend></legend>";
var nova = document.getElementById("aqui");
var novadiv = document.createElement("div");
var nomediv = "div";
novadiv.innerHTML = " <br><legend></legend>";
nova.appendChild(novadiv);

input++;
}

function validarCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

