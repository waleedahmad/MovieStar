$('.delete-movie').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        message: "Are you sure you want to delete this movie?",
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
                    url : '/admin/movies',
                    data : {
                        id : id
                    },
                    success : function(res){
                        if(res.deleted){
                            $(this).parents('.movie-tr').slideUp().remove();
                        }
                    }.bind(this)
                });
            }
        }.bind(this)
    });
});


$('.coming-soon').on('click', function(e){
    let id = $(this).attr('data-id');
    $.ajax({
        type : 'POST',
        url : '/admin/movies/coming_soon',
        data : {
            id : id,
            show : $(this).is(':checked')
        },
        success : function(res){
            console.log(res);
        }.bind(this)
    });
});
