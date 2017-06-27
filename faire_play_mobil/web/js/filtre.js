$(document).ready(function(){
    $('#rechercher').submit(function(evt){
        evt.preventDefault();
        function ajaxCall(category){
            var filtre = $('checkbox');
            $.ajax({
                url: "{{path('/filtre')}}",
                method: "post",
                data: {category :category}
            }).done(function(msg){
                refreshFiltre();
            });
        }

        function refreshFiltre(){
            filtre.innerHTML = "";
            $.each(JSON.parse(msg['category']), function(p, project){
                var li = document.createElement('li');
                var text = document.createTextNode(project.name + "" + project.photo);
                li.appendChild(text);
                filtre.appendChild(li);
            })
        }
    });

});