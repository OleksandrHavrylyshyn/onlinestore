// Кількість товару
let $qty_up = $('.qty .qty_up');
let $qty_down = $('.qty .qty_down');
// let $input = $('.qty .qty_input');


$qty_up.click(function(e){

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    let $deal_price = $("#deal-price");

    // change product price using ajax call
    $.ajax({url: "template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() >= 1 && $input.val() <= 9){
                $input.val(function(i, oldval){
                    return ++oldval;
                });

                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set subtotal price
                let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }

        }}); // closing ajax request
}); // closing qty up button

$qty_down.click(function(e){

    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);
    let $deal_price = $("#deal-price");

    // change product price using ajax call
    $.ajax({url: "Template/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($input.val() > 1 && $input.val() <= 10){
                $input.val(function(i, oldval){
                    return --oldval;
                });


                // increase price of the product
                $price.text(parseInt(item_price * $input.val()).toFixed(2));

                // set subtotal price
                let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
                $deal_price.text(subtotal.toFixed(2));
            }

        }}); // closing ajax request
}); // closing qty down button


// Isotope filter

var $grid = $(".grid").isotope({
    itemSelector : '.grid-item',
    layoutMode : 'fitRows',
    filter: function() {
        return qsRegex ? $(this).text().match( qsRegex ) : true;
    }
});

// filter items on button click
$(".button-group").on("click", "button", function(){
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue});
})

var qsRegex;

var $quicksearch = $('.quicksearch').keyup( debounce( function() {
    qsRegex = new RegExp( $quicksearch.val(), 'gi' );
    $grid.isotope();
}, 200 ) );

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
        clearTimeout( timeout );
        var args = arguments;
        var _this = this;
        function delayed() {
            fn.apply( _this, args );
        }
        timeout = setTimeout( delayed, threshold );
    };
}


}