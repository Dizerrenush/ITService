function toggleModal(e) {
    let modal = document.querySelector('.modal');
    if (modal.classList.contains("active")) {
        if (e.target.classList.contains('modal'))
            modal.classList.remove('active');
    } else {
        modal.classList.add('active');
    }
}

function switchTab(name){
    name=(name=='signin') ? name : 'signup';
    document.querySelector('.modal__form.active').classList.remove('active'); 
    document.querySelector('.modal__form.'+name).classList.add('active'); 
    document.querySelector('.modal__switcher.active').classList.remove('active'); 
    document.querySelector('.modal__switcher.'+name).classList.add('active'); 
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

                alert(this.responseText);
            }
            // console.log(urlEncodedData);
            xhr.send(urlEncodedData);
        };
    })

    
    document.querySelector('.cd-signin').onclick = toggleModal;
    // document.querySelector('.cd-signup').onclick = toggleModalReg;
    document.querySelector('.modal').onclick = toggleModal;

    document.querySelectorAll(".modal__nav a").forEach(elem => {
        let tab = elem.href.replace(/.+#(\w+)/,"$1");
        elem.onclick = function(){ switchTab(tab); }
    })
}

window.onload = main