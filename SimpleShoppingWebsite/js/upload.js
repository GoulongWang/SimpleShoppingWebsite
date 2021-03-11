function checkfile(sender) {
  var validExts = new Array(".jpg", ".png", ".jpeg");
  var fileExt = sender.value;
  fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
  if (validExts.indexOf(fileExt) < 0) {
    alert("檔案類型錯誤，可接受的副檔名有：" + validExts.toString());
    sender.value = null;
    return false;
  }
}

function check(){
  var size = document.getElementById("toyImg").files.item(0).size;
  if(size > 200000){
    alert("檔案必須小於 200 KB !");
    return false;
  }
  return true;
}

function isMaxLen(obj){  
	var MaxLen = obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : "";  
	if(obj.getAttribute && obj.value.length > MaxLen) obj.value = obj.value.substring(0,MaxLen)
}