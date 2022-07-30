
  document.addEventListener('DOMContentLoaded',(event)=>{
    let nom = document.getElementById('nom')
    let prenom = document.getElementById('prenom')
    let email= document.getElementById('email')
    let password= document.getElementById('password')
    let password2= document.getElementById('passwordConf')
    let nomP = document.getElementById('nomP')
    let prenomP = document.getElementById('prenomP')
    let emailP= document.getElementById('emailP')
    let passwordP= document.getElementById('passwordP')
    let passwordConfP= document.getElementById('passwordConfP')
    let passwordConfP2= document.getElementById('passwordConfP2')
    let p = document.querySelector('small')

    let regexLowerCase = /[a-z]{1,}/
    let regexUpperCase = /[A-Z]{1,}/
    let regexNumber = /[0-9]{1,}/
    let regexmail = /[a-z0-9]+@[a-z]+\.[a-z]{2,3}/

////////////////// formulaire inscription  ///////////////////

    nom.addEventListener('keyup',function(){
        
        if(this.value.length < 2){
            p.style.color='red'
            p.innerHTML = "le nom doit contenir au moins 2 caractères"
        }else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== false){
            
        }else if(this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "Nom valide"
        
            
        }
    })

    prenom.addEventListener('keyup',function(){
            
        if(this.value.length < 2){
            p.style.color='red'
            p.innerHTML = "le prenom doit contenir au moins 2 caractères"
        }else{
            p.innerHTML=""
        }

        if(regexLowerCase.test(this.value)== false){
            
        }else if(this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "prenom valide"
        
            
        }
    })

    
    email.addEventListener('keyup',function(){
        
        if(regexmail.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "Format email invalide"
        }else{
            p.innerHTML=""
        }
    
        if(regexmail.test(this.value)== true){
            p.style.color='green'
            p.innerHTML= "email valide"
        }
    })

    password.addEventListener('keyup',function(){
        if(this.value.length < 8 || regexNumber.test(this.value)== false || regexUpperCase.test(this.value)== false || regexLowerCase.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "veuillez entrer au moins 8 characteres contenants 1 majuscule 1 minuscule et un nombre"
        }
        
        else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== true && regexNumber.test(this.value)== true && regexUpperCase.test(this.value)==true && this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "password valide"

    }
    
    })

    password2.addEventListener('keyup',function(){
        
        if(this.value !== password.value){
            p.style.color='red'
            p.innerHTML = "les mots de passes ne sont pas identiques"
        }
        else{
            p.innerHTML=""
        }

        if(this.value === password.value){
            p.style.color='green'
            p.innerHTML= "confirmation ok "
        }
        
    })

//////////////////// formulaire page Profil  ////////////////////
    nomP.addEventListener('keyup',function(){
        
        if(this.value.length < 2){
            p.style.color='red'
            p.innerHTML = "le nom doit contenir au moins 2 caractères"
        }else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== false){
            
        }else if(this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "Nom valide"
        
            
        }
    })

    prenomP.addEventListener('keyup',function(){
            
        if(this.value.length < 2){
            p.style.color='red'
            p.innerHTML = "le prenom doit contenir au moins 2 caractères"
        }else{
            p.innerHTML=""
        }

        if(regexLowerCase.test(this.value)== false){
            
        }else if(this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "prenom valide"
        
            
        }
    })

    emailP.addEventListener('keyup',function(){
        
        if(regexmail.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "Format email invalide"
        }else{
            p.innerHTML=""
        }
    
        if(regexmail.test(this.value)== true){
            p.style.color='green'
            p.innerHTML= "email valide"
        }
    })

    passwordP.addEventListener('keyup',function(){
        if(this.value.length < 8 || regexNumber.test(this.value)== false || regexUpperCase.test(this.value)== false || regexLowerCase.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "veuillez entrer au moins 8 characteres contenants 1 majuscule 1 minuscule et un nombre"
        }
        
        else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== true && regexNumber.test(this.value)== true && regexUpperCase.test(this.value)==true && this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "password valide"

    }
    
    })

    passwordConfP.addEventListener('keyup',function(){
        if(this.value.length < 8 || regexNumber.test(this.value)== false || regexUpperCase.test(this.value)== false || regexLowerCase.test(this.value)== false){
            p.style.color='red'
            p.innerHTML = "veuillez entrer au moins 8 characteres contenants 1 majuscule 1 minuscule et un nombre"
        }
        
        else{
            p.innerHTML=""
        }
    
        if(regexLowerCase.test(this.value)== true && regexNumber.test(this.value)== true && regexUpperCase.test(this.value)==true && this.value.length >= 3){
            p.style.color='green'
            p.innerHTML= "password valide"

    }
        if(this.value !== passwordConfP2.value){
            p.style.color='red'
            p.innerHTML = "les mots de passes ne sont pas identiques"
        }
        else{
            p.innerHTML=""
        }

        if(this.value === password.value){
            p.style.color='green'
            p.innerHTML= "confirmation ok "
        }
        
    })

});
 