document.addEventListener("DOMContentLoaded", function()
{
    
    const form = document.querySelectorAll('input');
    const name = document.querySelector('.name');
    const email = document.querySelector('.email');
    const tel = document.querySelector('.tel');
    const content = document.querySelector('.content');
    const select = document.querySelector('.subject');
    const btn = document.querySelector('.btn');
    const errMsg = document.querySelector('.err_msg');

    const nameErr = document.querySelector('.name_err');
    const emailErr = document.querySelector('.email_err');
    const telErr = document.querySelector('.tel_err');
    const contentErr = document.querySelector('.content_err');
    const selectErr = document.querySelector('.select_err')
    const emailExp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;
    const telExp = /^[0-9]*$/;
    
    
    //selectboxチェック
    const validSelect = function(){
        if(select.value == 0){
            select.setAttribute('class','error');
            selectErr.textContent = '選択してください';
        }else{
            select.setAttribute('class','success');
            selectErr.textContent = '';
        }
        btnCheck();
    }

    //name
    name.addEventListener('keyup',() => {
        if(!name.value || !name.value.match(/\S/g)){
            nameErr.textContent = '入力必須です';
            name.classList.remove('success');
            name.classList.add('error');
        }else{
            nameErr.textContent = '';
            name.classList.remove('error');
            name.classList.add('success');
        }
        btnCheck();
    });

    content.addEventListener('keyup',() => {
        if(!content.value || !content.value.match(/\S/g)){
            contentErr.textContent = '入力必須です';
            content.classList.remove('success');
            content.classList.add('error');
        }else{
            contentErr.textContent = '';
            content.classList.remove('error');
            content.classList.add('success');
        }
        btnCheck();
    });

    tel.addEventListener('keyup',() => {
        if(tel.value === ''){
            tel.classList.add('error');
            tel.classList.remove('success');
            telErr.textContent = '入力必須です';
        }else if(telExp.test(tel.value)){
            tel.classList.add('success');
            tel.classList.remove('error');
            telErr.textContent = '';
        }else{
            tel.classList.remove('success');
            tel.classList.add('error');
            telErr.textContent = '半角数字のみご利用いただけます';
        }
        btnCheck();
    })

    email.addEventListener('keyup',() => {
        if(email.value === ''){
            emailErr.textContent = '入力必須です';
            email.classList.add('error');
            email.classList.remove('success');
        }else if(emailExp.test(email.value)){
            email.classList.add('success');
            email.classList.remove('error');
            emailErr.textContent = '';
        }else{
            email.classList.remove('success');
            email.classList.add('error');
            emailErr.textContent = 'email形式で入力してください';
        }
        btnCheck();
    });
    select.addEventListener('change',validSelect);
    
    

    const btnCheck = function(){
        
        if(name.getAttribute('class').includes('error') || email.getAttribute('class').includes('error')
         || tel.getAttribute('class').includes('error') || content.getAttribute('class').includes('error')
          || select.getAttribute('class').includes('error')){
            btn.disabled = true;
            btn.classList.add('disactive');
            btn.classList.remove('active');  
        }else{ 
            btn.disabled = false;
            btn.classList.add('active');
            btn.classList.remove('disactive'); 
        }
    }
    
    /*if((name.getAttribute('class').includes('success') && email.getAttribute('class').includes('success')
        && tel.getAttribute('class').includes('success') || content.getAttribute('class').includes('success')
        && select.getAttribute('class').includes('success')) || !(errMsg.textContent === '')){
            btn.disabled = false;
            btn.classList.add('active');
            btn.classList.remove('disactive');
        }else{ 
            
            btn.disabled = true;
            btn.classList.add('disactive');
            btn.classList.remove('active');
        }*/
});


