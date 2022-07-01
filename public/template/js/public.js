$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//load sản phẩm
function loadMore()
{
   const page = $('#page').val();
   $.ajax({
       type: 'POST',
       dataType: 'JSON',
       data: { page },
       url: '/services/load-product',
       success : function (result){
          if(result.html !== ''){
              $('#loadProduct').append(result.html);
              $('#page').val(page +1);
          }
          else {
              alert('Đã load xong sản phẩm');
              $('#button-loadMore').css('display', 'none');
          }
       }
   })

}

$(document).ready(function () {

    $("#num-product").on('change', function (e) {
        var max = $("#num-product").attr('data-product-max');
        var input_product = $("#num-product").val();
        console.log(input_product, 'input')
        console.log(max, 'max')
        if (input_product > max){
            alert('Vuot qua ton kho');
            $(".num-product").val(max);
        }
    })

    $(".btn-num-product-up").on('click', function (e){
        var max = $("#num-product").attr('data-product-max');
        var input_product = $("#num-product").val();
        if (input_product > max){
            alert('Vuot qua ton kho');
            $(".num-product").val(max);
        }
    })
})

