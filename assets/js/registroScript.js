const form = document.getElementById('form');
const campos = document.querySelectorAll('.campos');
const spans = document.querySelectorAll('.spanRequired');
const spans2 = document.querySelectorAll('.spanRequired2');
const emailRegex = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{3})?$/


form.addEventListener('submit', (event) => {
    event.preventDefault(); //desabilita o submit
    
    //executa as verificações
    nameValidate();
    emailValidate();
    passValidate();  


    if(imageExists()){
        imageValidate();
        spans2[0].style.display = 'none';
    }else{
        campos[3].style.borderBottom = '2px solid #e63636';
        spans2[0].style.display = 'block';
    }




    //caso passe por todas as validaçoes ele permite o submit
    if(nameValidate() && emailValidate() && passValidate() && imageValidate()){

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


function nameValidate(){
    if(campos[0].value.length < 4){
        return setError(0);

    }else{
        return removeError(0);
    }
}

function emailValidate(){
    if(!emailRegex.test(campos[1].value)){
        return setError(1);
    }else{
        return removeError(1);
    }
}

function passValidate(){
    if(campos[2].value.length < 8){
        return setError(2);
    }else{
        return removeError(2);
    }
}

function imageValidate(){
    let imageName = campos[3].value.split('.');
    const validExtensions = ['jpg', 'jpeg', 'png'];
    
    let isValid = false;

    for(let i =0; i <= imageName.length; i++){

        for(let e = 0; e < validExtensions.length; e++){
            
            if(imageName[i] == validExtensions[e]){
                isValid = true;
            }

        }

    }

    if(isValid){
        //caso esteja certo
        campos[3].style.borderBottom = '1px solid';
        spans[3].style.display = 'none';
    }else{
        //caso esteja errado
        campos[3].style.borderBottom = '2px solid #e63636';
        spans[3].style.display = 'block';
    }
}

function imageExists(){
    let exist = false;

    if(campos[3].value != ''){
        exist = true;
        return exist;
    }else{
        return exist;
    }
}
