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
    document.querySelector(".form__table.chng").innerHTML = "";
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
                    let html = '<table id="table__req" class="table"><tbody><tr class="title"><td>&nbsp;<span>ID:</span></td><td>&nbsp;<span>Мастер:</span></td><td>&nbsp;<span>Статус:</span></td><td>&nbsp;<span>Ф.И.О:</span></td><td>&nbsp;<span>Номер телефона:</span></td><td>&nbsp;<span>Тип:</span></td><td>&nbsp;<span>Модель:</span></td><td>&nbsp;<span>Проблема:</span></td></tr>';
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
                    document.querySelector(".form__table.req").innerHTML = html;

                    onRowClick("table__req", function (row) {
                        let value = row.getElementsByTagName("td")[0].innerHTML;
                        if (value != "&nbsp;<span>ID:</span>") {
                            document.querySelector('.content__form.active').classList.remove('active');
                            document.querySelector('.content__form.change_req').classList.add('active');
                            for (let i in result.users) {
                                if (result.users[i]['id'] == value) changeData(result.users[i]);
                            }
                        }
                    });

                }

                if (result.state == 11) {
                    document.querySelector(".form__outputbd").innerHTML = result.err;
                    let html = '<table id="table__tech" class="table"><tbody><tr class="title"><td>&nbsp;<span>ID:</span></td><td>&nbsp;<span>type:</span></td><td>&nbsp;<span>model:</span></td><td>&nbsp;<span>text:</span></td><td>&nbsp;<span>img:</span></td><td>&nbsp;<span>price:</span></td></tr>';
                    let cnt = 0;
                    for (let i in result.shop) {
                        if (cnt == 0) {
                            html += '<tr href="#' + result.shop[i]['id'] + '" >';
                            cnt++;
                        }
                        if (cnt == 1) {
                            html += '<td>' + result.shop[i]['id'] + '</td>' + '<td>' + result.shop[i]['type'] + '</td>' + '<td>' + result.shop[i]['model'] + '</td>' + '<td>' + result.shop[i]['text'] + '</td>' + '<td>' + result.shop[i]['img'] + '</td>' + '<td>' + result.shop[i]['price'] + '</td>';
                            cnt++;
                        }
                        if (cnt == 2) {
                            cnt = 0;
                            html += '</tr>';
                        }
                    }

                    html += '</table>';
                    document.querySelector(".form__table.tech").innerHTML = html;

                    onRowClick("table__tech", function (row) {
                        let value = row.getElementsByTagName("td")[0].innerHTML;
                        if (value != "&nbsp;<span>ID:</span>") {
                            console.log(value);
                            document.querySelector('.content__form.active').classList.remove('active');
                            document.querySelector('.content__form.change_tech').classList.add('active');
                        }
                    });

                }
                if (result.state == 12) {
                    document.querySelector(".form__outputbd").innerHTML = result.err;
                    let html = '<table id="table__req" class="table"><tbody><tr class="title"><td>&nbsp;<span>ID:</span></td><td>&nbsp;<span>username:</span></td><td>&nbsp;<span>fullname:</span></td><td>&nbsp;<span>usertype:</span></td><td>&nbsp;<span>Номер телефона:</span></td></tr>';
                    let cnt = 0;
                    for (let i in result.users) {
                        if (cnt == 0) {
                            html += '<tr href="#' + result.users[i]['id'] + '" >';
                            cnt++;
                        }
                        if (cnt == 1) {
                            html += '<td>' + result.users[i]['id'] + '</td>' + '<td>' + result.users[i]['username'] + '</td>' + '<td>' + result.users[i]['fullname'] + '</td>' + '<td>' + result.users[i]['usertype'] + '</td>' + '<td>' + result.users[i]['phone'] + '</td>';
                            cnt++;
                        }
                        if (cnt == 2) {
                            cnt = 0;
                            html += '</tr>';
                        }
                        
                    }

                    html += '</table>';
                    document.querySelector(".form__table.user").innerHTML = html;

                    onRowClick("table__req", function (row) {
                        let value = row.getElementsByTagName("td")[0].innerHTML;
                        if (value != "&nbsp;<span>ID:</span>") {
                            document.querySelector('.content__form.active').classList.remove('active');
                            document.querySelector('.content__form.change_req').classList.add('active');
                            for (let i in result.users) {
                                if (result.users[i]['id'] == value) changeData(result.users[i]);
                            }
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
function changeData(users) {

    let html = '<h2>Изменение данных заявки</h2> <form method="post" action="BdRequest.php">';

    html += '<input class="input__form" type="hidden" name="IDs" value="' + users['IDs'] + ' ">';

    html += '<div class="label">Логин Мастера:</div><input class="input__form" type="text" name="master" placeholder="Мастер*" value="' + users['master'] + ' " required>';
    html += '<div class="label">Статус:</div><input class="input__form" type="text" name="status" placeholder="Статус*" value="' + users['status'] + ' " required>';
    html += '<div class="label">Ф.И.О:</div><input class="input__form" type="text" name="fullname" placeholder="Ф.И.О*" value="' + users['fullname'] + ' " required>';
    html += '<div class="label">Номер телефона:</div><input class="input__form" type="text" name="phone" placeholder="+7(___)___-__-__*" value="' + users['phone'] + ' " required>';
    html += '<div class="label">Тип техники:</div><input class="input__form" type="text" name="type" placeholder="Тип техники*" value="' + users['type'] + ' " required>';
    html += '<div class="label">Модель:</div><input class="input__form" type="text" name="model" placeholder="Модель*" value="' + users['model'] + ' " required>';
    html += '<div class="label">Проблема:</div><input class="input__form" type="text" name="issue" placeholder="Проблема*" value="' + users['issue'] + ' " required>';

    html += '<input type="hidden" name="do_change_req"><input class="btn" type="submit" value="Submit">';
    console.log(users);
    html += '</form>';
    document.querySelector(".form__table.chng").innerHTML = html;
}




function onloadWindow() {
    if (Location != "Bdwork.php") main();
    if (Location == "User_page.php") change();

    Bdwork();


}
window.onload = onloadWindow

