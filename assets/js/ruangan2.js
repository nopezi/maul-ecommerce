$(document).ready(function(){
    $('.mdb-select').materialSelect();
    tampil_data_ruangan();
    function tampil_data_ruangan(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url() ?>/admin/tampil_ruangan',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                var y=0;
                for(i=0; i<data.length; i++){
                    y++;

                    if(data[i].status == "digunakan"){
                        var status = '<p class="text-danger">'+data[i].status+'</p>';
                    }else if(data[i].status == "dibooking"){
                        var status = '<p class="text-warning">'+data[i].status+'</p>';
                    }else if(data[i].status == "kosong" || data[i].status == ""){
                        var status = '<p class="text-primary">'+data[i].status+'</p>';
                    }

                    html += '<tr>' +
                            '<td>' +y+ '</td>' +
                            '<td>' +data[i].no_ruangan+'</td>' +
                            '<td>' +data[i].nama_ruangan+ '</td>' +
                            '<td>' +status+ '</td>' +
                            '<td>' +data[i].keterangan+ '</td>' +
                            '<td>' + 
                            '<a data-toggle="modal" data-target="#editData" id="'+data[i].id_ruangan+'" class="btn btn-warning btn-sm item_edit"><i class="fas fa-pencil-alt"></i></a> ' +
                            '<button id="'+data[i].id_ruangan+'" class="hapus_ruangan btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button> ' +        
                            '</td>'
                            '</tr>';
                }
                $('#tampil_data').html(html);
                $('#mydata').DataTable();
                $('.dataTables_length').addClass('bs-select');
            }
        });
    }

    // tampil data
    // $('#tampil_data').load("<?php//base_url()?>/admin/tampil_ruangan");

    // simpan data ruangan

    $("#submit").click(function(){
                    
        $.ajax({
            
            url : "<?php echo base_url(); ?>/admin/tambah_ruangan", 
            type: "POST", 
            data: $("#form_ruangan").serialize(),
            success: function(data) {

            // $('#tampil_data').html(data);
                tampil_data_ruangan();
            }
        });
            
        return false;
        
    });

    // tampil data per id

    $('#tampil_data').on('click','.item_edit',function(){
        var id_ruangan=$(this).attr('id');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('admin/get_ruangan')?>",
            dataType : "JSON",
            data : {id_ruangan:id_ruangan},
            success: function(data){
                $.each(data,function(id_ruangan, no_ruangan, nama_ruangan, keterangan){
                    $('#editData').modal('show');
                    $('[name="id_ruangan_edit"]').val(data.id_ruangan);
                    $('[name="no_ruangan_edit"]').val(data.no_ruangan);
                    $('[name="nama_ruangan_edit"]').val(data.nama_ruangan);
                    $('[name="keterangan_edit"]').val(data.keterangan);
                    $('[name="status_edit"]').val(data.status);
                });
            }
        });
        return false;
    });

    // edit data

    $("#submitedit").click(function(){
   
        $.ajax({
            
            url : "<?php echo base_url(); ?>/admin/edit_ruangan", 
            type: "POST", 
            data: $("#form_edit_ruangan").serialize(),
            success: function(data) {
                tampil_data_ruangan();
            }
        });
            
        return false;
        
    });

    // hapus data ruangan

    $(document).on('click', '.hapus_ruangan', function(){
        var row_id = $(this).attr("id");
        $.ajax({
            url     : "<?=base_url()?>/admin/hapus_ruangan",
            method  : "POST",
            data    : {row_id : row_id},
            success : function(data){
                tampil_data_ruangan();
            }
        });
    });

});