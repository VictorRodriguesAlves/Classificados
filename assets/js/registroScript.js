const form = document.getElementById('form');
const campos = document.querySelectorAll('.campos');
const spans = document.querySelectorAll('.spanRequired');
const emailRegex = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{3})?$/


form.addEventListener('submit', (event) => {
    event.preventDefault(); //desabilita o submit
    
    //executa as verificações
    nameValidate();
    emailValidate();
    passValidate();  

    
    if(spans[3].style.display == 'none' || spans[3].style.display == '' ){
        if(nameValidate() && emailValidate() && passValidate() ){

            form.submit();
    
        }
    }else {
        console.log('oi')
    }

})

function setError(index){
    campos[index].style.border = '2px solid #e63636';
    spans[index].style.display = 'block';

}

function removeError(index){
    campos[index].style.border = '2px solid';
    spans[index].style.display = 'none';

}


function nameValidate(){
    if(campos[0].value.length < 4){
        setError(0);
        return false;

    }else{
        removeError(0);
        return true;
    }
}

function emailValidate(){
    if(!emailRegex.test(campos[1].value)){
        setError(1);
        return false;
    }else{
        removeError(1);
        return true;
    }
}

function passValidate(){
    if(campos[2].value.length < 8){
        setError(2);
        return false;
    }else{
        removeError(2);
        return true;
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
        campos[3].style.borderBottom = '1px solid';
        spans[3].style.display = 'none';
        return true;
    }else{
        campos[3].style.borderBottom = '2px solid #e63636';
        spans[3].style.display = 'block';
        return false;
    }
}

