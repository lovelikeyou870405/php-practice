function check_join_data() {
    if (document.myform.account.value.length == 0)
        alert("使用者帳號不可為空白");
    else if (document.myform.password.value.length == 0)
        alert("");
    else if (document.myform.chpassword.value.length == 0)
        alert("");
    else if (document.myform.password.value != document.myform.chpassword.value)
        alert("");
    else if (document.myform.name.value.length == 0)
        alert("");
    else if (document.myform.bd.value.length == 0)
        alert("");

    else
        myform.submit();
}
