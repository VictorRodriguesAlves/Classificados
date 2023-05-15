const form = document.getElementById('form');
const campos = document.querySelectorAll('.campos');
const spans = document.querySelectorAll('.spanRequired');
const emailRegex = /^[\w+.]+@\w+\.\w{2,}(?:\.\w{3})?$/;

console.log(campos)

form.addEventListener('submit', (event) => {
    event.preventDefault(); //desabilita o submit
    
    //executa as verificações
    tituloValido();
    descricaoValida();
    valorValido();
    imageValidate();  

    

        if(tituloValido() && descricaoValida() && valorValido() && imageValidate()){

            form.submit();
    
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

function tituloValido(){
    if(campos[0].value.length >= 3){
        removeError(0);
        return true;
    }else{
        setError(0);
        return false;
    }
}

function descricaoValida(){
    if(campos[1].value.length >= 9){
        removeError(1);
        return true;
    }else{
        setError(1);
        return false;
        
    }
}

function valorValido(){
    if(campos[2].value > -1 && campos[2].value != 0){
        removeError(2);
        return true;
    }else{
        setError(2);
        return false;
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