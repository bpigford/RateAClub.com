function validate() {
    var p1 = document.getElementById('newPassword1');
    var p2 = document.getElementById('newPassword2');;
    var q = document.getElementById("error-msg");

    q.style.display = 'none';

    console.log(p1.value);
    console.log(p2.value);

    if (p1.value == p2.value)
    {
        document.getElementById('changePass-form').submit();
    }
    else {
            q.style.display = 'block';
    }
};
