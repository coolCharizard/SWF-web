function jsonToArray(jsonString){
    arr = JSON.parse(jsonString),
    len = arr.length;
	return arr;
}
function arrayToListHTML(arr) {
    var out = "";
    var i;

	out += '<ul>'
    for(i = 0; i<arr.length-1; i++) {
		for(var property in arr[i]){
			if (!arr[i][property]){
				out += "<li>"+property + ': ' + "<i>(value not set)</i>" + "</li>";
			}
			else{
				out += "<li>"+property + ': ' + arr[i][property] + "</li>";
			}
		}
		out+="<br>"
	}
	out += '</ul><br>'
	return out;
}
