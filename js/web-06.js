function check_data()
{
    if(document.myform.account.value.length==0)
        alert("帳號不可為空白");
    else if(document.myform.password.value.length==0)
        alert("密碼不可為空白");
    else
        myform.submit();
}

