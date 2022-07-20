<!DOCTYPE html>
<html dir="rtl">

<head>
    <title>Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<style>
    .container {
        padding: 50px;
        margin-left: auto;
        margin-right: auto;

    }


    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col">
                <section class="h-100 gradient-form  ">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100 ">
                            <div class="col-xl-10">
                                <div class="card rounded-3 text-black align-items-center shadow"
                                    style="border-radius: 25px;">
                                    <div class="row g-0 ">

                                        <div class="card-body p-md-5 mx-md-4 ">

                                            <form id="SubmitForm">
                                                @csrf
                                                <div class="form-outline mb-4">
                                                    <label class="form-label " for="bill_no">رقم
                                                        الفاتورة</label>
                                                    <input type="text" id="bill_no" name="bill_no"
                                                        class="form-control" placeholder="رقم الفاتورة" />
                                                    <span class="text-danger" id="bill_noErrorMsg"></span>

                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="buyer_no">رقم
                                                        البائع</label>
                                                    <input type="text" id="buyer_no" name="buyer_no"
                                                        class="form-control" placeholder="رقم البائع" />
                                                    <span class="text-danger" id="buyer_noErrorMsg"></span>

                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="seller_no">رقم
                                                        المشتري</label>
                                                    <input type="text" id="seller_no" name="seller_no"
                                                        class="form-control" placeholder="رقم المشتري" />
                                                    <span class="text-danger" id="seller_noErrorMsg"></span>

                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="date_published">التاريخ</label>
                                                    <input type="date" id="date_published" name="date_published"
                                                        class="form-control" placeholder="التاريخ" />
                                                    <span class="text-danger" id="date_publishedErrorMsg"></span>

                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="tax_amount">قيمة
                                                        الضريبه</label>
                                                    <input type="text" id="tax_amount" name="tax_amount"
                                                        class="form-control" placeholder="قيمة الضريبه" />
                                                    <span class="text-danger" id="tax_amountErrorMsg"></span>

                                                </div>




                                                <div class="text-center pt-1 mb-5 pb-1">
                                                    <button
                                                        class="btn btn-primary btn-block fa-lg  mb-3"
                                                        type="submit" id="submit">اضافة</button>

                                                </div>



                                            </form>




                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script type="text/javascript">
        $(document).on('click', '#submit', function (e) {

        e.preventDefault();


     /*   var bill_no = $('#bill_no').val();
        var email = $('#buyer_no').val();
        var saller_no = $('#saller_no').val();
        var date = $('#date').val();
       var tax_amount = $('#tax_amount').val();

*/
        $.ajax({
          url: "{{ route('admin.store') }}",
          dataType: "json",
          type:"POST",
          data:$('#SubmitForm').serialize(),
         success:function(response){


            $('#successMsg').show();
            console.log(response);
          },
          error: function(response) {
            $('#bill_noErrorMsg').text(response.responseJSON.errors.bill_no);
            $('#buyer_noErrorMsg').text(response.responseJSON.errors.buyer_no);
            $('#seller_noErrorMsg').text(response.responseJSON.errors.seller_no);
            $('#dateErrorMsg').text(response.responseJSON.errors.date);
            $('#tax_amountErrorMsg').text(response.responseJSON.errors.tax_amount);

          },
          });
        });

    </script>
</body>

</html>
