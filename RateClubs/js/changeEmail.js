function validate() {
    var p1 = document.getElementById('newEmail');
    var q = document.getElementById("error-msg");

    q.style.display = 'none';


    if (p1.value !== '')
    {
        document.getElementById('changeEmail-form').submit();
    }
    else {
        q.style.display = 'block';
    }
};