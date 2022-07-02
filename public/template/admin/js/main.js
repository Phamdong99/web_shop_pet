$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Xoá danh mục
function removeRow(id, url)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có chắc chắn muốn xoá mục này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                datatype: 'JSON',
                data: { id },
                url: url,
                success: function (result)
                {
                    if(result.error === false){
                        Swal.fire(
                            'Deleted!',
                            result.message,
                            'success'
                        )
                        location.reload();
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            'Xóa không thành công. Vui lòng thử lại',
                            'error'
                        )
                    }
                }
            })

        }
    })
}
function removeProduct(id, url)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "Nếu sản phẩm đã có trong đơn hàng, việc xoá sản phẩm nghĩa là xoá đơn hàng." +
            "Bạn có chắc chắn muốn xoá mục này không ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                datatype: 'JSON',
                data: { id },
                url: url,
                success: function (result)
                {
                    if(result.error === false){
                        Swal.fire(
                            'Deleted!',
                            result.message,
                            'success'
                        )
                        location.reload();
                    }
                    else
                    {
                        Swal.fire(
                            'Error!',
                            result.message,
                            'error'
                        )
                    }
                }
            })

        }
    })
}

/*upload file*/
$('#upload').change(function (){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    console.log($(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url : '/admin/upload/services',
        success: function (results){

            console.log(results)
            if(results.error === false)
            {
                $('#image_show').html('<a href="'+ results.url +'" target="_blank">' +
                    '<img src="'+ results.url +'" width="100px"></a>');

                $('#file').val(results.url);

            }
            else
            {
                alert('upload file lỗi');
            }
        },
        error: function (xhr) {
            console.log(xhr)
        }

    })
});
