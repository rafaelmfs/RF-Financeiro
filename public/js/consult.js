
const select = document.querySelector("#consult-select");
let type = document.querySelector("#type");
let timeCourse = document.querySelector("#timeCourse");
let movementsFilter = document.querySelectorAll(".movements-filter");
let category = document.querySelector("#category");
let account = document.querySelector("#account");

select.addEventListener('click', ()=>{


    if(select.value === "category"){
        category.style.display = "block";
    }else{
        category.style.display = "none";
    }if(select.value === "financialAccount"){
        account.style.display = "block";
    }else{
        account.style.display = "none";
    }if(select.value === "financialTransactions"){
        type.style.display = "block";
        timeCourse.style.visibility = "visible";
    }else{
        type.style.display = "none";
        timeCourse.style.visibility = "hidden";
    }

});
