//Valida Idade > 18
function validadata(){
    let data = document.getElementById("data_nasc").value; 
    data = data.replace(/\//g, "-"); 
    var data_array = data.split("-"); 
    
    if(data_array[0].length != 4){
       data = data_array[2]+"-"+data_array[1]+"-"+data_array[0]; 
    }
    
    // Comparar datas e calcular idade
    let hoje = new Date();
    let nasc  = new Date(data);
    let idade = hoje.getFullYear() - nasc.getFullYear();
    let m = hoje.getMonth() - nasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
    
    if(idade < 18){
        alert("O Aluno deve ter mais de 18 anos!");
        };
};

//Máscara padrão de telefone
$('#telefone').mask('(00) 000000000');

//Máscara padrão de matricula
$('#matricula').mask('000000');

// Janela para confirmar o delete
$('.deletar').on('click', function(event){
    event.preventDefault();

    var Link=$(this).attr('href');

    if(confirm("Deseja mesmo apagar este dado?")) {
        window.location.href=Link;
    }else{
        return false;
    }

});