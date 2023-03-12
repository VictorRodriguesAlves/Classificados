const form = document.getElementById('form');
const campos = document.querySelectorAll('.campos');
const spans = document.querySelectorAll('.spanRequired');
const emailRegex = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{3})?$/

console.log(campos);
form.addEventListener('submit', (event) => {
    event.preventDefault(); //desabilita o submit
    
    //executa as verificações
    emailValidate();
    passValidate();  

    //caso passe por todas as validaçoes ele permite o submit
    if(emailValidate() && passValidate()){

        form.submit();

    }

})

function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';

    return false;
}

function removeError(index){
    campos[index].style.border = '2px solid';
    spans[index].style.display = 'none';

    return true;
}

function emailValidate(){
    if(!emailRegex.test(campos[0].value)){
        return setError(0);
        return false;
    }else{
        return removeError(0);
        return true;
    }
}

function passValidate(){
    if(campos[1].value.length < 8){
        return setError(1);
        return false;
    }else{
        return removeError(1);
        return true;
    }
}
