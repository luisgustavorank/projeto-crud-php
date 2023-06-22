const addressForm = document.querySelector("#address-form");
const cepInput = document.querySelector("#cep");
const addressInput = document.querySelector("#endereco");
const cityInput = document.querySelector("#cidade");
const neighborhoodInput = document.querySelector("#bairro");
const regionInput = document.querySelector("#estado");
const formInputs = document.querySelectorAll("[data-input]");

// Validar o INPUT do CEP
cepInput.addEventListener("keypress", (ev) => {
  const onlyNumbers = /[0-9]|\./;
  const key = String.fromCharCode(e.keyCode);

  console.log(key);

  console.log(onlyNumbers.test(key));

// Permitir somente numeros
  if (!onlyNumbers.test(key)) {
    e.preventDefault();
    return;
  }
});

// Pegar o endereço - CEP
cepInput.addEventListener("keyup", (e) => {
  const inputValue = e.target.value;

  if (inputValue.length === 8) {
    getAddress(inputValue);
  }
});

// BUSCAR o endereço pela API
const getAddress = async (cep) => {

  cepInput.blur();

  const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

  const response = await fetch(apiUrl);

  const data = await response.json();

  console.log(data);
  console.log(formInputs);
  console.log(data.erro);

// Ativar campos desabilitados
const toggleDisabled = () => {
  formInputs.forEach((input) => {
  input.removeAttribute("disabled");
  });
};

  if (addressInput.value === "") {
        toggleDisabled();
  };

// Preencher Campos
  addressInput.value = data.logradouro;
  cityInput.value = data.localidade;
  neighborhoodInput.value = data.bairro;
  regionInput.value = data.uf;
  
// Mostrar erro e limpar formulario
function limpa_formulario_cep() {
  cepInput.value = ('');
  addressInput.value = ('');
  cityInput.value = ('');
  neighborhoodInput.value = ('');
  regionInput.value = ('');
  }

  if (!("erro" in data)) {
      //Atualiza os campos com os valores.
      console.log("OK");
    } //end if.
  else {
    alert("CEP Inválido, tente novamente.");
    limpa_formulario_cep();
    }

  //Atualiza os campos, para não bugar o LABEL
  M.updateTextFields()
}; 