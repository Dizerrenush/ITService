function toggleModal(e) {
    let modal = document.querySelector('.modal');
    if (modal.classList.contains("active")) {
        if (e.target.classList.contains('modal'))
            modal.classList.remove('active');
    } else {
        modal.classList.add('active');
    }
    document.querySelector(".form__output").innerHTML = "";
}

function switchTab(name){
    name=(name=='signin') ? name : 'signup';
    document.querySelector('.modal__form.active').classList.remove('active'); 
    document.querySelector('.modal__form.'+name).classList.add('active');
    let switcherin = document.querySelector('.modal__frame');

     if (switcherin.classList.contains("left")){   
       
        switcherin.classList.remove('left');

     } else {
         switcherin.classList.add('left');
     } 
    document.querySelector('.modal__switcher.active').classList.remove('active'); 
    document.querySelector('.modal__switcher.'+name).classList.add('active');
    document.querySelector(".form__output").innerHTML = ""; 
}

function main() {
    document.querySelectorAll('.modal__form').forEach(formDOM => {
        formDOM.onsubmit = e => {
            e.preventDefault();//не переходим на форму

            let form = e.target,
                link = form.action,//считываем 
                body = new FormData(form);//тело запроса(инфа которую отправлем)

            let urlEncodedData = "",
                urlEncodedDataPairs = [],
                name;

            for (var [key, value] of body.entries()) { 
                urlEncodedDataPairs.push( encodeURIComponent( key ) + '=' + encodeURIComponent( value ) );
            }
            urlEncodedData = urlEncodedDataPairs.join( '&' ).replace( /%20/g, '+' );

            // console.log(body.);

            let xhr = new XMLHttpRequest();//инициализация запроса к sign.php
            xhr.open('POST', link, true);//true - асинхронно

            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//классика
            

            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;

                 let result = JSON.parse(this.responseText);
                if(result.state == "4") document.location.href="Index.php"; 
                if(result.state == "2"){ 
                    switchTab('signin');

            } 
                 document.querySelector(".form__output").innerHTML = result.err;
                 

                 
            }
            // console.log(urlEncodedData);
            xhr.send(urlEncodedData);
        };
    })

    let button = document.querySelector('.cd-signin');
    if(button) 
    button.onclick = toggleModal;
    let button__mobile = document.querySelector('.sign');
    if(button__mobile) 
    button__mobile.onclick = toggleModal;
    // document.querySelector('.cd-signup').onclick = toggleModalReg;
    document.querySelector('.modal').onclick = toggleModal;

    document.querySelectorAll(".modal__nav a").forEach(elem => {
        let tab = elem.href.replace(/.+#(\w+)/,"$1");
        elem.onclick = function(){ switchTab(tab); }
    })
}

window.onload = main