

function Ol(){
    //$(".Search").click($(".Search").css("border", "1px solid red"));
    // $(".gradient-tex").click(function(){
    //     $("#panel").css("padding", "40px;");
    // });
    $(".Search input:enabled").css("color", "#001100");

    $(".gradient-tex").focus(function(){
        $(".Search").css("padding", "40px");
        $(".Search").css("border", "2x solid #374c83f5");
    })
    .blur(function(){$(".Search").css("padding", "20px");});
    
    // $(".Search").mouseenter(function(){
    //     $(".Search").css("padding", "40px");
    // })
    // .mouseleave(function(){$(".Search").css("padding", "20px");});

    $("input[id][name*='zametkat']").css("color", "red");

    $(".Search input").css("border", "1px solid #374c83f5");
    
}


var zamet;
function zametka(_zametka){

    var fl;
        if (confirm('Добавить заметку?'))
            {
                // alert('Привет!');
                fl = 1;
            }
            else
            {
                alert('Вы нажали кнопку отмена')
                fl = 0;
            }
            if (fl == 1){
                var _zamet = prompt('Всё верно? (при нажатии нет заметка будет пуста)',_zametka)
                zamet = _zamet
                
            }
}

function show(){
    return zamet;
}