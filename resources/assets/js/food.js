$('.order-food').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    bootbox.prompt("Please Enter Quantity for your order!", function(result){
        if(result){
            $.ajax({
                type : 'POST',
                url : '/food/order',
                data : {
                    id : id,
                    quantity : result
                },
                success : function(res){
                    if(res.created){
                        bootbox.alert('Item added to cart');
                    }else{
                        bootbox.alert('Error : ' + res.errors.quantity);
                    }
                }.bind(this)
            });
        }
    });

});

$('.delete-cart').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        message: "Are you sure you want to delete this item from cart?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-primary'
            },
            cancel: {
                label: 'No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    type : 'DELETE',
                    url : '/food/checkout',
                    data : {
                        id : id
                    },
                    success : function(res){
                        if(res.deleted){
                            $(this).parents('.cart-tr').slideUp().remove();
                        }
                    }.bind(this)
                });
            }
        }.bind(this)
    });
});

$('.process-checkout').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        message: "Are you sure you want to place an order for these food items?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-primary'
            },
            cancel: {
                label: 'No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    type : 'POST',
                    url : '/food/checkout',
                    data : {
                        id : id
                    },
                    success : function(res){
                        if(res.processed){
                            window.location = '/food/orders';
                        }
                    }.bind(this)
                });
            }
        }.bind(this)
    });
});

$('.cancel-order').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        message: "Are you sure you want to cancel this order?",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-primary'
            },
            cancel: {
                label: 'No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    type : 'POST',
                    url : '/food/order/cancel',
                    data : {
                        id : id
                    },
                    success : function(res){
                        if(res.deleted){
                            window.location = '/food/orders';
                        }
                    }.bind(this)
                });
            }
        }.bind(this)
    });
});

$('.order-completed').on('click', function(e){
    let id = $(this).attr('data-id');
    $.ajax({
        type : 'POST',
        url : '/order/complete',
        data : {
            id : id,
            action : $(this).is(':checked')
        },
        success : function(res){
            console.log(res);
        }.bind(this)
    });
});

$('.order-paid').on('click', function(e){
    let id = $(this).attr('data-id');
    $.ajax({
        type : 'POST',
        url : '/order/paid',
        data : {
            id : id,
            action : $(this).is(':checked')
        },
        success : function(res){
            console.log(res);
        }.bind(this)
    });
});

