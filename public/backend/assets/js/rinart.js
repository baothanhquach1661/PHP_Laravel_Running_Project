$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
            }
        }) 
    });
});


$(function(){
    $(document).on('click','#confirm',function(e){
    	e.preventDefault();
    	var link = $(this).attr("href");
    	Swal.fire({
    		title: 'Bạn có chắc?',
    		text: "Đã xác nhận đơn hàng?",
    		icon: 'warning',
    		showCancelButton: true,
    		confirmButtonColor: '#3085d6',
    		cancelButtonColor: '#d33',
    		confirmButtonText: 'Vơn, đã xác nhận!'
    	}).then((result) => {
    		if (result.isConfirmed) {
    			window.location.href = link
    			Swal.fire(
    				'Confirmed!',
    				'Your order has been confirmed.',
    				'success'
    				)
    		}
    	}) 
    });
});

$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Đã xác nhận đơn hàng?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vơn, đã xác nhận!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirmed!',
                    'Your order has been updated.',
                    'success'
                    )
            }
        }) 
    });
});

$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Đã soạn xong đơn hàng?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vơn, đã xác nhận!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirmed!',
                    'Your order has been updated.',
                    'success'
                    )
            }
        }) 
    });
});

$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Đã gửi đơn hàng?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vơn, đã xác nhận!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirmed!',
                    'Your order has been updated.',
                    'success'
                    )
            }
        }) 
    });
});

$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Bạn có chắc?',
            text: "Đơn hàng này đã hoàn tất?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Vơn, đã xác nhận!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Confirmed!',
                    'Your order has been finished.',
                    'success'
                    )
            }
        }) 
    });
});


$(function(){
    $(document).on('click','#approve',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Approve This Request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Approved!',
                    'This request has been approved.',
                    'success'
                    )
            }
        }) 
    });
});


















































