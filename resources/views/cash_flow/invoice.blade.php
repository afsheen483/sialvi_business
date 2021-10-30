<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>


    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>


  
    {{-- Second One --}}
    @php
        $count = 0;

    @endphp
    @while ($count < 2)
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-6 col-6">
                    <div class="invoice-title"><br><br>
                        <h2 style="text-align: center">Sialvi Motors</h2>
                        <h6 style="text-align: center">03007473301 - Butt Plaza near white palace marriage hall Gujranwala</h6>
                        <h4 style="text-align: center">Installment Collection Receipt</h4>
                        <strong class="float-right">Generate Invoice Date</strong><br>
                        <Span class="float-right">{{ date("F j, Y, g:i a"); }}</Span><br>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <address style="font-size: 15px;">
                                {{-- <strong style="font-size: 15px;">Generate By:</strong><br> --}}
                                <label>Name : </label> {{ $data[0]->name }}<br>
                                <label>Contact : </label> {{ $data[0]->contact}}<br>
                                <label>Sale No : </label> {{ $data[0]->sale_id }}<br>
                                <label>Engine No : </label> {{ $sale[0]->engine_num }}<br>

                            </address>
                        </div>
                        <div class="col-lg-6">
                            <address style="font-size: 15px; float: right;">

                                @php
                                $debit = $data[0]->debit_card;
                                $credit = $data[0]->credit_card;
                                $balnce = $debit-$credit;
                                @endphp
                                <label>Balance : </label>{{ ' ' }} {{ ($remaining_rent  + $remaining_asal) - ($total_rent[0] + $installment_amount[0]) }}<br>
                                <label>Amount : </label>{{ ' ' }} {{ ($total_rent[0] + $installment_amount[0])}}<br>
                                <label>Description : </label>{{ ' ' }} {{ $data[0]->description }}<br>
                                <label>Date : </label>{{ ' ' }} {{ $data[0]->date }}<br>
                            </address>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"></strong></h3>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-5">
                                    <h5> قسط ہمیشہ دفتر میں جمع کرائیں اور کمپیوٹرائزڈ پرچی حاصل کریں۔ کمپیوٹرائزڈ پرچی
                                        کے بغیر
                                        محکمہ ذمہ دار نہیں ہے ۔</h5>
                                </div>
                                <div class="" style="margin-left: 39%">
                                    <label>Mobile : </label>{{ ' ' }} {{ Auth::user()->contact }}<br>
                                    <label>Recived By : </label>{{ ' ' }} {{ Auth::user()->name }}<br>
                                    <label>Signature : </label><br>
                                </div>
                            </div><br><br>
                            <hr><br><br><br>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    @php
        $count ++;
    @endphp
    @endwhile
</body>


<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
{{-- <script src="{{  }}"></script> --}}

<!-- Slimscroll JS -->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('assets/js/chart.morris.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
      var wrapper = document.getElementById("signature-pad"),
          clearButton = wrapper.querySelector("[data-action=clear]"),
          saveButton = wrapper.querySelector("[data-action=save]"),
          canvas = wrapper.querySelector("canvas"),
          signaturePad;
    
      // Adjust canvas coordinate space taking into account pixel ratio,
      // to make it look crisp on mobile devices.
      // This also causes canvas to be cleared.
      window.resizeCanvas = function () {
        var ratio =  window.devicePixelRatio || 1;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
      }
    
      resizeCanvas();
    
      signaturePad = new SignaturePad(canvas);
    
      clearButton.addEventListener("click", function(event) {
        signaturePad.clear();
      });
    
        //event.preventDefault();
    $('#save').click(function() {
           var image = $("#invoice_file").val();
           var item_ids = $("#item_ids").val();
           var vendor_id = $("#vendor_id").val();
        if (signaturePad.isEmpty()) {
          alert("Please provide a signature first.");
        } else {
          var dataUrl = signaturePad.toDataURL();
          var image_data = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");
          var text = $("#signature").text(image_data);
        
        //   $.ajax({
        //     url: "{{ url('/save_signature') }}",
        //     type: 'POST',
        //     cache: false,
        //     data: {
        //         _token:'{{ csrf_token() }}',
        //         image_data : image_data,
        //         image : image,
        //         item_ids : item_ids,
        //         vendor_id : vendor_id
        //         },
        //     success:function(data){
        //         console.log(data);
        //   }
        // });
        }
      });
      });
    // });
    
    
</script>

<script type="text/javascript">
    $(function () {
  var wrapper = document.getElementById("signature-pad"),
      clearButton = wrapper.querySelector("[data-action=clear]"),
      saveButton = wrapper.querySelector("[data-action=save]"),
      canvas = wrapper.querySelector("canvas"),
      signaturePad;

  // Adjust canvas coordinate space taking into account pixel ratio,
  // to make it look crisp on mobile devices.
  // This also causes canvas to be cleared.
  window.resizeCanvas = function () {
    var ratio =  window.devicePixelRatio || 1;
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
  }

  resizeCanvas();

  signaturePad = new SignaturePad(canvas);

  clearButton.addEventListener("click", function(event) {
    signaturePad.clear();
  });

    //event.preventDefault();
$('#save').click(function() {
       var image = $("#invoice_file").val();
       var item_ids = $("#item_ids").val();
       var vendor_id = $("#vendor_id").val();
    if (signaturePad.isEmpty()) {
      alert("Please provide a signature first.");
    } else {
      var dataUrl = signaturePad.toDataURL();
      var image_data = dataUrl.replace(/^data:image\/(png|jpg);base64,/, "");
      var text = $("#signature").text(image_data);
    
    //   $.ajax({
    //     url: "{{ url('/save_signature') }}",
    //     type: 'POST',
    //     cache: false,
    //     data: {
    //         _token:'{{ csrf_token() }}',
    //         image_data : image_data,
    //         image : image,
    //         item_ids : item_ids,
    //         vendor_id : vendor_id
    //         },
    //     success:function(data){
    //         console.log(data);
    //   }
    // });
    }
  });
  });
// });


</script>


</html>