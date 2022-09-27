<?php

if(isset($_POST['sigsave']))
{
    //echo "hello ".$_POST['text'];
    $img = $_POST['imageData'];
    //echo $img;
    // $img = str_replace('data:image/png;base64,', '', $img);
    // $img = str_replace(' ', '+', $img);
    $encoded_image = explode(",", $img)[1];
    $data = base64_decode($encoded_image);
    $file = "image_name.png";
    $success = file_put_contents($file, $data);
//    header('Location: '.$_POST['return_url']);

//   $data_uri = "data:image/png;base64,iVBORw0K...";
//    $data_uri = $img;
//    $encoded_image = explode(",", $data_uri)[1];
//    $decoded_image = base64_decode($encoded_image);
//    file_put_contents("signature.png", $decoded_image);

}

?>
<!doctype html>
<html lang="fr" class="h-100 login-page">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Idov Mamane">
    <title>Validation de la livraison</title>
    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Font Awesome icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- custom core CSS -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>

<body class="h-100">
    <div class="container-fluid main-form">
        <div class="row main-con">
            <main class="header-space">
                <div class="container">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form class="" id="validateDel" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row mt-2">
                                    <input type="hidden" name="imageData" id="my_hidden">
                                    <label class="col-form-label col-md-3" for="ville">Signature:</label>
                                    <input type="text" name="text" id="">
                                    <div class="col-md-9">
                                        <canvas id="signaturepad" class="signature-pad" width=400 height=200 style="border: solid black 1px;"></canvas>
                                        <div>
                                            <button type="button" id="clear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex h-100 justify-content-between align-items-center">
                                    <button type="submit" name="sigsave" class="btn btn-primary px-4" id="">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var signaturePad = new SignaturePad(document.getElementById('signaturepad'),{
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
        var cancelButton = document.getElementById('clear');
        cancelButton.addEventListener('click', function (event) {
            signaturePad.clear();
        });
        $(document).on("submit","#validateDel",function (e) {
            //e.preventDefault();
            //var canvas = $("#signature-pad");
            const canvas = document.getElementById('signaturepad');
            //console.log(canvas.toDataURL('image/png'));
           $('#my_hidden').val(canvas.toDataURL('image/png'));
            //$("#validateDel").submit();
        });
    });
</script>
</html>