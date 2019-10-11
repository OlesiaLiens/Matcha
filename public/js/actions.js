var like = document.getElementById('like_user');
var ban = document.getElementById('ban_user');
var fake = document.getElementById('fake_user');
var user_email = document.getElementsByClassName('user_email')[0].id;

if (like) {
    like.addEventListener('click', likeUser, true);
}

function likeUser() {
    if (like.classList.contains('red')) {
        like.classList.remove('red');
        like.classList.add('liked');

        $.ajax({
            url: '/actions/like/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })

    } else {
        like.classList.remove('liked');
        like.classList.add('red');

        $.ajax({
            url: '/actions/unLike/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })
    }
}

if (fake) {
    fake.addEventListener('click', fakeUser, true);
}

function fakeUser() {
    if (fake.classList.contains('fake')) {
        fake.classList.remove('fake');
        fake.classList.add('faked');


        $.ajax({
            url: '/actions/fake/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })

    } else {
        fake.classList.remove('faked');
        fake.classList.add('fake');

        $.ajax({
            url: '/actions/unFake/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })
    }
}

if (ban) {
    ban.addEventListener('click', banUser, true);
}

function banUser() {

    if (ban.classList.contains('ban')) {
        ban.classList.remove('ban');
        ban.classList.add('baned');

        // if (ban.classList.contains('baned')) {
        //     like.setAttribute('display', 'none');
        // }
        console.log('We here');
        $('.delete').hide();

        $.ajax({
            url: '/actions/ban/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })

    } else {
        ban.classList.remove('baned');
        ban.classList.add('ban');

        $('.delete').show();

        $.ajax({
            url: '/actions/unBan/',
            type: 'post',
            dataType: 'json',
            //contentType: 'application/json',
            data: {"data": JSON.stringify(user_email)}
        })
    }
}

