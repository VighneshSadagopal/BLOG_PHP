function EnableBtn(policy){
    var submit=document.getElementById("submit");
    submit.disabled = policy.checked ? false : true;
    if(!submit.disabled){
        submit.focus();
        submit.style.background="#000"
    }
}