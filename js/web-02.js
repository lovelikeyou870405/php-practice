var XHR = null;
XHR = createXMLHttpRequest();
function startRequest()
{
    XHR.open("GET","./test.txt",true);
    XHR.onreadystatechange = handleStateChange;
    XHR.send(null);
}

function handleStateChange()
{
    if(XHR.readyState==4)
    {
        if(XHR.status == 200)
            document.getElementById("span1").innerHTML = XHR.responseText;
        else
            window.alert("檔案開啟錯誤");
    }
}

function startRequest2()
{
    XHR.open("GET","./php/getServerTime.php",true);
    XHR.onreadystatechange = handleStateChange2;
    XHR.send(null);
}

function handleStateChange2()
{
    if(XHR.readyState==4)
    {
        if(XHR.status == 200)
            document.getElementById("span2").innerHTML = XHR.responseText;
        else
            window.alert("檔案開啟錯誤");
    }
}