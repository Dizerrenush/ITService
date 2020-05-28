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

function toggleMenu(e) {
    let menu = document.querySelector('.sidebar');
    if (menu.classList.contains("active")) {
        if (e.target.classList.contains('sidebar'))
            menu.classList.remove('active');
    } else {
        menu.classList.add('active');
    }
}

function switchTab(name) {
    name = (name == 'signin') ? name : 'signup';
    document.querySelector('.modal__form.active').classList.remove('active');
    document.querySelector('.modal__form.' + name).classList.add('active');
    let switcherin = document.querySelector('.modal__frame');

    if (switcherin.classList.contains("left")) {

        switcherin.classList.remove('left');

    } else {
        switcherin.classList.add('left');
    }
    document.querySelector('.modal__switcher.active').classList.remove('active');
    document.querySelector('.modal__switcher.' + name).classList.add('active');
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
                urlEncodedDataPairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
            }
            urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

            // console.log(body.);

            let xhr = new XMLHttpRequest();//инициализация запроса к sign.php
            xhr.open('POST', link, true);//true - асинхронно

            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//классика


            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;

                let result = JSON.parse(this.responseText);
                if (result.state == "4") document.location.href = "Index.php";
                if (result.state == "2") {
                    switchTab('signin');

                }
                document.querySelector(".form__output").innerHTML = result.err;



            }
            // console.log(urlEncodedData);
            xhr.send(urlEncodedData);
        };
    })
    let button__mobile__menu = document.querySelector('.toggler');
    if (button__mobile__menu)
        button__mobile__menu.onclick = toggleMenu;

    let button = document.querySelector('.cd-signin');
    if (button)
        button.onclick = toggleModal;
    let button__mobile = document.querySelector('.sign');
    if (button__mobile)
        button__mobile.onclick = toggleModal;
    // document.querySelector('.cd-signup').onclick = toggleModalReg;
    document.querySelector('.modal').onclick = toggleModal;
    document.querySelector('.sidebar').onclick = toggleMenu;

    document.querySelectorAll(".modal__nav a").forEach(elem => {
        let tab = elem.href.replace(/.+#(\w+)/, "$1");
        elem.onclick = function () { switchTab(tab); }
    })


}

// смена пароля
function change() {
    document.querySelectorAll('.user__page').forEach(formDOM => {
        formDOM.onsubmit = e => {
            e.preventDefault();//не переходим на форму

            let form = e.target,
                link = form.action,//считываем 
                body = new FormData(form);//тело запроса(информация которую отправлем)

            let urlEncodedData = "",
                urlEncodedDataPairs = [],
                name;

            for (var [key, value] of body.entries()) {
                urlEncodedDataPairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
            }
            urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

            // console.log(body.);

            let xhr = new XMLHttpRequest();//инициализация запроса к sign.php
            xhr.open('POST', link, true);

            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;

                let result = JSON.parse(this.responseText);
                document.querySelector(".error__message").innerHTML = result.err;//вывод ответа

            }
            xhr.send(urlEncodedData);
        };
    })
}

function switchPage(name) {

    document.querySelector('.btn__switch.selected').classList.remove('selected');
    document.querySelector('.btn__switch.' + name).classList.add('selected');
    document.querySelector('.content__form.active').classList.remove('active');
    document.querySelector('.content__form.' + name).classList.add('active');
    document.querySelector(".form__outputbd").innerHTML = "";
}
function switchPagesub(name) {

    document.querySelector('.btn__switch__sub.selected').classList.remove('selected');
    document.querySelector('.btn__switch__sub.' + name).classList.add('selected');
    document.querySelector('.request.active').classList.remove('active');
    document.querySelector('.request.' + name).classList.add('active');
    document.querySelector(".form__outputbd").innerHTML = "";
}
function onRowClick(tableId, callback) {
    var table = document.getElementById(tableId),
        rows = table.getElementsByTagName("tr"),
        i;
    for (i = 0; i < rows.length; i++) {
        table.rows[i].onclick = function (row) {
            return function () {
                callback(row);
            };
        }(table.rows[i]);
    }
};
function Bdwork() {
    document.querySelectorAll('.content__body').forEach(formDOM => {
        formDOM.onsubmit = e => {
            e.preventDefault();//не переходим на форму

            let form = e.target,
                link = form.action,//считываем 
                body = new FormData(form);//тело запроса(инфа которую отправлем)

            let urlEncodedData = "",
                urlEncodedDataPairs = [],
                name;

            for (var [key, value] of body.entries()) {
                urlEncodedDataPairs.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
            }
            urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');



            let xhr = new XMLHttpRequest();//инициализация запроса к BdRequest.php
            xhr.open('POST', link, true);

            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


            xhr.onreadystatechange = function () {
                if (this.readyState != 4) return;


                let result = JSON.parse(this.responseText);
                if (result.state == 4) {
                    document.querySelector(".form__outputbd").innerHTML = result.err;
                }
                if (result.state == 10) {
                    document.querySelector(".form__outputbd").innerHTML = result.err;
                    let html = '<table id="table__id" class="table"><tbody><tr class="title"><td>&nbsp;<span>ID:</span></td><td>&nbsp;<span>Мастер:</span></td><td>&nbsp;<span>Статус:</span></td><td>&nbsp;<span>Ф.И.О:</span></td><td>&nbsp;<span>Номер телефона:</span></td><td>&nbsp;<span>Тип:</span></td><td>&nbsp;<span>Модель:</span></td><td>&nbsp;<span>Проблема:</span></td></tr>';
                    let cnt = 0;
                    for (let i in result.users) {
                        if (cnt == 0) {
                            html += '<tr href="#' + result.users[i]['id'] + '" >';
                            cnt++;
                        }
                        if (cnt == 1) {
                            html += '<td>' + result.users[i]['id'] + '</td>' + '<td>' + result.users[i]['master'] + '</td>' + '<td>' + result.users[i]['status'] + '</td>' + '<td>' + result.users[i]['fullname'] + '</td>' + '<td>' + result.users[i]['phone'] + '</td>' + '<td>' + result.users[i]['type'] + '</td>' + '<td>' + result.users[i]['model'] + '</td>' + '<td>' + result.users[i]['issue'] + '</td>';
                            cnt++;
                        }
                        if (cnt == 2) {
                            cnt = 0;
                            html += '</tr>';
                        }
                    }

                    html += '</table>';
                    document.querySelector(".form__table").innerHTML = html;

                    onRowClick("table__id", function (row) {
                        let value = row.getElementsByTagName("td")[0].innerHTML;
                        if (value != "&nbsp;<span>ID:</span>") {
                            console.log(value);
                            document.querySelector('.content__form.active').classList.remove('active');
                            document.querySelector('.content__form.change_cell').classList.add('active');
                        }
                    });

                }
                if (result.state == 2) {
                    document.querySelector(".form__outputbd").innerHTML = result.err;
                }

            }
            xhr.send(urlEncodedData);
        };
    })

    document.querySelectorAll(".nav a").forEach(elem => {
        let tab = elem.href.replace(/.+#(\w+)/, "$1");
        elem.onclick = function () { switchPage(tab); }
    })

    document.querySelectorAll(".subnav a").forEach(elem => {
        let tab = elem.href.replace(/.+#(\w+)/, "$1");
        elem.onclick = function () { switchPagesub(tab); }


    })



}
function onloadWindow() {
    if (Location != "Bdwork.php") main();
    if (Location == "User_page.php") change();
    Bdwork();
}
window.onload = onloadWindow

