var btn = document.querySelector('button#getlevels');
var levelsTextCenter = document.querySelector('tbody');
var menu = document.querySelector('select#dgetlevels');
btn.addEventListener('click', requestLevels ,false);
menu.addEventListener('change', function ()
{

    requestLevels(this.value);

},false);
function requestLevels (numberOfLevels)
{
    var req = new XMLHttpRequest();
    var url = 'https://randomuser.me/api/?results=' + ((typeof numberOfLevels == 'object') ? 10 : numberOfLevels);
    req.onprogress = function ()
    {
        levelsTextCenter.innerHTML = 'إحضار المستويات ...';
    }

    req.onreadystatechange = function ()
    {

        if (req.readyState === req.DONE) {
            var levelsTextCenterHmtl = '';
            var levels = JSON.parse(req.response);
            for (var i= 0, ii =levels.results.length; i < ii; i++){

                levelsTextCenterHmtl +=
                    '<tr> ' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + levels.results[i].name.first + '</td>' +
                    '<td>' + levels.results[i].location.street.name + '</td>' +
                    '<td>' + levels.results[i].location.city +'</td>' +
                    '<td class="text-center">' + levels.results[i].email +
                    '</td>' +
                    '<td class="text-center">' +
                    '<div class="list-icons">' +
                    '<div class="dropdown">' +
                    '<a href="javascript: void(0);" class="list-icons-item" data-toggle="dropdown">' +
                    '<i class="icon-menu9"></i>' +
                    '</a>' +

                    '<div class="dropdown-menu">' +
                    '<a href="#" class="dropdown-item"><i class="icon-pencil7"></i> تعديل المستوي </a>' +
                    '<a href="#" class="dropdown-item"><i class="icon-eye8"></i> شاهد المستوي </a>' +

                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '</tr>' ;
            }
            levelsTextCenter.innerHTML = levelsTextCenterHmtl;
        }
    }
    req.onerror = function (){
        alert(new Error('Sorry the request was not complete successfully'));
    }
    req.open('GET', url);

    req.send();
}
