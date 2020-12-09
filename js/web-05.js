function check_data()
{
    if(document.myform.author.value.length == 0)
        alert("作者欄位不可以空白哦");
    else if(document.myform.subject.value.length == 0)
        alert("主題欄位不可以空白哦");
    else if(document.myform.content.value.length == 0)
        alert("內容欄位不可以空白哦");
    else
        myform.submit();
}