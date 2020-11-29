<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Insert With Form Validation</title>
</head>

<body class="container my-5">
    <h5>Condeigniter Ajax Inserting data into mysql with form validation, display error inside modal bootstrap</h5>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$no = 0;
			foreach ($product as $prd) :
				$no++
			?>
            <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $prd['name']; ?></td>
                <td><?= $prd['description']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="item" novalidate method="POST">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Name
                                    <input type="text" class="form-control border border-dark" id="name" name="name"
                                        aria-describedby="emailHelp" value="<?php echo set_value('name'); ?>">
                                    <span id="name_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Description
                                    :</label>
                                <textarea class="form-control border border-dark" name="description" id="description"
                                    required></textarea>
                                <span id="dsc_error" class="text-danger"></span>
                            </div>
                            <button type="button" class="btn btn-primary mr-2" id="submit" name="submit">Submit</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>

        <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
<script>
$(document).ready(function() {
    $("#submit").click(function(e) {
        e.preventDefault();

        var data = $('.item').serialize();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "<?= base_url('Welcome/add_product'); ?>",
            data: data,
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.href = "<?= base_url('Welcome'); ?>"

                } else {
                    $("#name_error").html(data.error.n_error);
                    $("#dsc_error").html(data.error.d_error);
                }
            }

        });
    });
});
</script>