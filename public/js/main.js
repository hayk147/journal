$(function(){
    // Journal section
    $("#journal_creator").submit(function(e){
        e.preventDefault();

        var form = $("#journal_creator")[0];
        var formData = new FormData(form);

        $.ajax({
            url: '/journals',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status == 'success'){
                    $('.alert-success').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-success').addClass('d-none')
                    }, 3000);
                    $("#journal_creator").trigger("reset");
                }
            },
            error: function(response){
                if(response.status == 400){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    $("#journal_updater").submit(function(e){
        e.preventDefault();

        var id = $('.update-journal').attr('data-id');

        var form = $("#journal_updater")[0];
        var formData = new FormData(form);

        $.ajax({
            url: '/journals/' + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
               if(response.status == 'success'){
                   $('.journal-image').attr('src', '/images/'+response.image);
                   $('.alert-success').removeClass('d-none');
                   setTimeout(function(){
                       $('.alert-success').addClass('d-none')
                   }, 3000);
               }
            },
            error: function(response){
                if(response.status == 400){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    $('.delete-journal').click(function(){
        let journal_id = $(this).attr('data-id');
        $('.delete-journal-sure').attr('data-id', journal_id)
    });

    $('.delete-journal-sure').click(function(){
        let journal_id = $(this).attr('data-id');
        let elem =  $('button[data-id="'+journal_id+'"].delete-journal');
        let row = elem.parents('tr');
        $.ajax({
            url: '/journals/' + journal_id,
            type: 'DELETE',
            success: function(response){
                if(response.status == 'success'){
                    row.remove()
                }
            },
            error: function(response){
                if(response.status == 200){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    //author section
    $("#author_creator").submit(function(e){
        e.preventDefault();

        var form = $("#author_creator")[0];
        var formData = new FormData(form);

        $.ajax({
            url: '/authors',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status == 'success'){
                    $('.alert-success').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-success').addClass('d-none')
                    }, 3000);
                    $("#author_creator").trigger("reset");
                }
            },
            error: function(response){
                if(response.status == 400){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    $("#author_updater").submit(function(e){
        e.preventDefault();

        var id = $('.update-author').attr('data-id');

        var form = $("#author_updater")[0];
        var formData = new FormData(form);

        $.ajax({
            url: '/authors/' + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status == 'success'){
                    $('.alert-success').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-success').addClass('d-none')
                    }, 3000);
                }
            },
            error: function(response){
                if(response.status == 400){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    $('.delete-author').click(function(){
        let author_id = $(this).attr('data-id');
        $('.delete-author-sure').attr('data-id', author_id)
    });

    $('.delete-author-sure').click(function(){
        let author_id = $(this).attr('data-id');
        let elem =  $('button[data-id="'+author_id+'"].delete-author');
        let row = elem.parents('tr');
        $.ajax({
            url: '/authors/' + author_id,
            type: 'DELETE',
            success: function(response){
                if(response.status == 'success'){
                    row.remove()
                }
            },
            error: function(response){
                if(response.status == 200){
                    $('.alert-danger').removeClass('d-none');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none')
                    }, 3000);
                }
            }
        });
    });

    //dataTable
    $('#journals-table').dataTable({
        "searching": false,
        "columnDefs": [ {
            "targets": [0,1,2,4],
            "orderable": false
        } ],
        "order": [[ 3, "desc" ]]
    });
    $('#authors-table').dataTable({
        "searching": false,
        "columnDefs": [ {
            "targets": [0,2,3],
            "orderable": false
        }],
        "order": [[ 1, "asc" ]]
    });
});
