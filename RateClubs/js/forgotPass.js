function validate() {
    var p1 = document.getElementById('newPassword1');
    var p2 = document.getElementById('newPassword2');
    var user = document.getElementById('username');
    var email = document.getElementById('email');
    var q = document.getElementById("error-msg");
    var u = document.getElementById("error-msg2");
    var e = document.getElementById("error-msg3");

    q.style.display = 'none';
    u.style.display = 'none';
    e.style.display = 'none';

    console.log(p1.value);
    console.log(p2.value);

    if (p1.value == p2.value && user !== '' && email !== '')
    {
        document.getElementById('create-form').submit();
    }
    else {
        if(p1.value !== p2.value)
            q.style.display = 'block';
        else {
            if(user !== '')
                u.style.display = 'block';
            else
                e.style.display = 'block';
        }
    }
};
