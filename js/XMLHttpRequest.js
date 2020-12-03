function createXMLHttpRequest()
{
	try	//其他非IE瀏覽器
	{
        var XHR = new XMLHttpRequest();
        console.log('非IE瀏覽器');
	}
	catch(e1)	//捕捉到錯誤，表示不是非IE瀏覽器
	{
		try	//IE6+瀏覽器
		{
            var XHR = new ActiveXObject("Msxmal2.XMLHTTP");
            console.log('IE6+瀏覽器');
		}
		catch(e2)	//捕捉到錯誤，表示不是IE6+瀏覽器
		{
			try	//IE5瀏覽器
			{
                var XHR = new ActiveXObject("Microsoft.XMLHTTP");
                console.log('IE5瀏覽器');
			}
			catch(e3)	//捕捉到錯誤，表示不支援Ajax
			{
                var XHR = false;
                console.log('不支援Ajax');
			}
		}
	}
	return XHR;
}