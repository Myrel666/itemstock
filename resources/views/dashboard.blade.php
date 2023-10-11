<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products Dinamically</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row my-4">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow" >
                    <div class="card-header" >
                        <h4>Add Items</h4>
                    </div>
                    <div class="card-body p-4" >
                        <div id="show_alert"></div>
                        <form action="{{ route('items.store') }}" method="POST" id="add_form">
                            @csrf
                            <div id="show_item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
                                    </div>
                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-success add_item_btn">Add More</button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" value="Add" class="btn btn-primary w-25" id="add-btn" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".add_item_btn").click(function(e){
            e.preventDefault();
            $("#show_item").prepend(`<div class="row append_items">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
                                    </div>
                                    <div class="col-md-2 mb-3 d-grid">
                                        <button class="btn btn-danger remove_item_btn">Remove</button>
                                    </div>
                                </div>`);
        });
        $(document).on('click', '.remove_item_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

        $("#add_form").submit(function(e){
            e.preventDefault();
            $("#add_btn").val('Adding...');
            $.ajax({
                url: '{{ route('items.store') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    $("#add_btn").val('Add');
                    $("#add_form")[0].reset();
                    $(".append_item").remove();
                    $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
                }
            })
        })
    });
</script>
</body>
</html>