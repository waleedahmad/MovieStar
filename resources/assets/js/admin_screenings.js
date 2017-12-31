$('.delete-screening').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');
    bootbox.confirm({
        message: "Are you sure you want to delete this screening?",
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
                    url : '/admin/screenings',
                    data : {
                        id : id
                    },
                    success : function(res){
                        if(res.deleted){
                            $(this).parents('.screening-tr').slideUp().remove();
                        }
                    }.bind(this)
                });
            }
        }.bind(this)
    });
});