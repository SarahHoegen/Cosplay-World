function f_ndatas(){
    n = document.getElementById("ndatas").value;
    div = document.getElementById("datas")
    div.innerHTML = ""
    for(c = 1;c <= n; c++){
        html = "<div class='form-group'> "+
        "    <label for='data'>Data Dia "+ c +"</label>"+
        "    <div  class='inputs'>"+
        "        <input type='date' name='data"+ c +"' class='form-control' id='data"+ c +"' required>"+
        "    </div>"+
        "</div>"+

        "<div class='form-group'>"+
        "    <label for='hora'>Hora em que começa (Dia "+ c +")</label>"+
        "    <div  class='inputs'>"+
        "        <input type='time' name='hora"+ c +"' class='form-control' id='hora"+ c +"' required>"+
        "    </div>"+
        "</div>"+

        "<div class='form-group'>"+
        "    <label for='hora'>Hora em que termina (Dia "+ c +")</label>"+
        "    <div  class='inputs'>"+
        "        <input type='time' name='hora_fim"+ c +"' class='form-control' required>"+
        "    </div>"+
        "</div>";
        div.innerHTML += html;
    }
}