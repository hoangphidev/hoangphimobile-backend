<script type="text/javascript">
    $(document).ready(function () {  
        $('#dataTable_previous a').text("Trước");
        $("#dataTable_next a").text("Sau");
        $('#check_all').on('click', function(e) {  
         if($(this).is(':checked',true))   
         {
            $(".checkbox").prop('checked', true);
            $("#btnDelete").removeAttr('hidden');
         } else {  
            $(".checkbox").prop('checked',false);
            $("#btnDelete").attr('hidden','');  
         }    
        });    
         $(document).on("click" ,".checkbox",function(){
             if($('.checkbox:checked').length == $('.checkbox').length){    
                $('#check_all').prop('checked',true);
                   
            }else{   
                $('#check_all').prop('checked',false);   
            }
            if($(this).is(':checked',true))   
             {
                $("#btnDelete").removeAttr('hidden'); 
             } else if($('.checkbox:checked').length == 0) {  
               $("#btnDelete").attr('hidden',''); 
             }  
         });

        $('.delete-all-employee').on('click', function(e) {   
            var idsArr = [];    
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  
            if(idsArr.length <=0)  
            {  
                alert("Hãy chọn vào thông tin bạn định xóa");  
            }  else {  
                if(confirm("Bạn có chắc muốn xóa?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('employee.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                                   window.location.href="{{route('listemployee')}}";
                            } else {
                                window.location.href="{{route('listemployee')}}";
                            }
                        },
                        error: function (data) {
                            alert('Bạn phải thay đổi hoặc xóa quyền và user đang áp dụng lên group này');
                        }
                    });
                }  
            }  
        });

        $('.delete-all-news').on('click', function(e) {   
            var idsArr = [];    
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  
            if(idsArr.length <=0)  
            {  
                alert("Hãy chọn vào thông tin bạn định xóa");  
            }  else {  
                if(confirm("Bạn có chắc muốn xóa?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('news.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                                window.location.href="{{route('listnews')}}";
                            } else {
                                window.location.href="{{route('listnews')}}";
                            }
                        },
                        error: function (data) {
                            alert('Bạn phải thay đổi hoặc xóa quyền và user đang áp dụng lên group này');
                        }
                    });
                }  
            }  
        });

        $('.delete-all-product').on('click', function(e) {   
            var idsArr = [];    
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  
            if(idsArr.length <=0)  
            {  
                alert("Hãy chọn vào thông tin bạn định xóa");  
            }  else {  
                if(confirm("Bạn có chắc muốn xóa?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('product.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                                window.location.href="{{route('listproduct')}}";
                            } else {
                               alert(data['message']);
                               window.location.href="{{route('listproduct')}}";
                            }
                        },
                        error: function (data) {
                            alert('Bạn phải thay đổi hoặc xóa quyền và user đang áp dụng lên group này');
                        }
                    });
                }  
            }  
        });

        $('.delete-all-banner').on('click', function(e) {   
            var idsArr = [];    
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  
            if(idsArr.length <=0)  
            {  
                alert("Hãy chọn vào thông tin bạn định xóa");  
            }  else {  
                if(confirm("Bạn có chắc muốn xóa?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('banner.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                                window.location.href="{{route('listbanner')}}";
                            } else {
                               alert(data['message']);
                               window.location.href="{{route('listbanner')}}";
                            }
                        },
                        error: function (data) {
                            alert('Bạn phải thay đổi hoặc xóa quyền và user đang áp dụng lên group này');
                        }
                    });
                }  
            }  
        });

        $('.delete-all-brand').on('click', function(e) {   
            var idsArr = [];    
            $(".checkbox:checked").each(function() {  
                idsArr.push($(this).attr('data-id'));
            });  
            if(idsArr.length <=0)  
            {  
                alert("Hãy chọn vào thông tin bạn định xóa");  
            }  else {  
                if(confirm("Bạn có chắc muốn xóa?")){  
                    var strIds = idsArr.join(","); 
                    $.ajax({
                        url: "{{ route('brand.multiple-delete') }}",
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $(".checkbox:checked").each(function() {  
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                                window.location.href="{{route('listbrand')}}";
                            } else {
                               alert(data['message']);
                               window.location.href="{{route('listbrand')}}";
                            }
                        },
                        error: function (data) {
                            alert('Bạn phải thay đổi hoặc xóa quyền và user đang áp dụng lên group này');
                        }
                    });
                }  
            }  
        });


        
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#myInputModal").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTableModal tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
