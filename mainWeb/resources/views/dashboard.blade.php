<x-app-layout>

  <div class="container align-items-center shadow-lg" style="width: 500px;hight:600px; margin-top:50px;">
    <form id="SubmitForm">
        @csrf
        <div class="form-outline mb-3">
            <label class="form-label " for="bill_no">رقم
                الفاتورة</label>
            <input type="text" id="bill_no" name="bill_no"
                class="form-control @error('bill_no')
                is-invalid
                @enderror" placeholder="رقم الفاتورة" />
            <span class="text-danger " id="bill_noErrorMsg"></span>

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
            <button style="color:white;background:yellow;" class="btn btn-warning btn-block fa-lg  mb-3 "
                type="submit" id="submit">اضافة</button>

        </div>



    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">

            $(document).on('click', '#submit', function (e) {

            e.preventDefault();
            $('#bill_noErrorMsg').text("");
            $('#buyer_noErrorMsg').text("");
            $('#seller_noErrorMsg').text("");
            $('#dateErrorMsg').text("");
            $('#tax_amountErrorMsg').text("");

            $.ajax({
              url: "{{ route('admin.store') }}",
              dataType: "json",
              type:"POST",
              data:$('#SubmitForm').serialize(),
             success:function(response){


                $('#successMsg').show();
                swal( "","تم أضافة فاتورتك بنجاح", "success");

                const myTimeout = setTimeout(myGreeting, 3000);
                function myGreeting() {
                location.reload();
                }
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
</x-app-layout>

