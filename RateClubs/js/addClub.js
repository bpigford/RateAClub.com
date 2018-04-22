function validate() {
    var clubName = document.getElementById('clubName');
    var clubEmail = document.getElementById('clubEmail');
    var clubDesc = document.getElementById('clubDesc');
    var q = document.getElementById("error-msg");
    var e = document.getElementById('error-msg2');
    var d = document.getElementById('error-msg3');

    q.style.display = 'none';
    e.style.display = 'none';
    d.style.display = 'none';

    console.log(clubEmail.value);
    console.log(clubName.value);
    console.log(clubDesc.value);
    if (clubName.value !== '' && clubEmail.value !== '' && clubDesc.value !== '')
    {
        document.getElementById('addClub-form').submit();
    }
    else {
        if(clubName.value == '') {
            q.style.display = 'block';
        }
        else {
            if(clubEmail.value == '') {
                e.style.display = 'block';
            }
            else
                d.style.display = 'block';
        }

    }
};