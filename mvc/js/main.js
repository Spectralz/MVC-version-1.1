var cart = {};

$('document').ready(function(){
    loadGoods();
});

function loadGoods() {
    $.getJSON('../models/jsonProducts.php', function (data) {
        var out = '';

        out+='<table className="table table-bordered"> ';
        out+='<thead>';
        out+='<tr>';
        out+='<th scope="col" class="col-1">Название</th>';
        out+='<th scope="col" class="col-1">Категория</th>';
        out+='<th scope="col" class="col-1">Цена</th>';
        out+='<th scope="col" class="col-1">Описание</th>';
        out+='<th scope="col" class="col-1">Добавить в корзину</th>';
        out+='<th scope="col" class="col-1">Оформить <br>заказ</th>';
        out+='</tr>';
        out+='</thead>';
        out+='<tbody>';

        for (var key in data){
            out+='<tr>';
            out+='<td>'+data[key]['name']+'</td>';
            out+='<td>'+data[key]['category']+'</td>';
            out+='<td>'+data[key]['price']+'</td>';
            out+='<td>'+data[key]['description']+'</td>';
            out+='<td><button class="addToCart" data-art="'+data[key]['id']+'">Купить</button></td>';
            out+='</tr>';

        }
        out+='</tbody>';
        out+='</table>';
        $('.container').html(out);
        $('button.addToCart').on('click', addToCart);
    });
}

function addToCart() {
    let articul = $(this).attr('data-art');
    let promise = fetch('/addToCart/?id='+articul, {
        method: 'GET',
    });
}