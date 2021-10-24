let errorMsg = document.querySelectorAll('.text-error');
let requiredFields = document.querySelectorAll('.required-field');
let save = document.querySelector("#btnSave");

save.addEventListener('click', function(event){
    event.preventDefault();
    requiredFields.forEach((field, i) => {
        if(!(field.value)){
            field.classList.add('border', 'border-danger');
            errorMsg[i].style.display = "block";
        }else{
            field.classList.remove('border', 'border-danger');
            errorMsg[i].style.display = "none";
        }
    })
})
