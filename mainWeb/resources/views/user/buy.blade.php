
<x-guest-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <div class="container  justify-content-center  " style="width:500px; ">
        <div class="row  shadow-lg " style=" margin-top:25%; margin-lift:auto;margin-right:auto;  border-radius:25px;">


            <div class="col my-auto">
                <div class="row justify-content-center  mb-3 mx-auto text-center px-3" style="width: 55%;">
                    <span class="mt-5 text-large text-center mx-auto " dir="rtl">
                        قم بمسح رمز ال QR
                    </span>

                    <!---->



                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="display: inline-block;" class="btn  btn-link font-bold m-0 p-0 pb-1" id="mInquiry">
                        او قم بالاستعلام عن طريق رقم الفاتورة
                    </button>
                </div>
                <div class=" justify-content-center  mb-3 mx-auto text-center px-3">
                    <video autoplay
                        style="height:200px;width:200px; object-fit: cover; margin:auto;  border-radius: 25px; border: 2px solid black;"
                        id="preview"></video>
                </div>

                <span class=" mt-5 text-small text-center mx-auto w-100" dir="rtl">
                <div id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                    class="modal fade dir-rtl text-end">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row form-row align-items-center mx-0 px-0 my-3">
                                    <div class="col mb-auto">
                                        <div class="form-group"><label for="" class="mb-1">أدخل رقم
                                                فاتورة مقاصة
                                                المبيعات</label><label for="" class="mb-1 float-left"> Enter
                                                Maqassa <span class="times-font">P
                                                </span> Invoice
                                                number </label><input type="text" id="search" name="search"
                                                autocomplete="off" placeholder="رقم الفاتورة / invoice number"
                                                class="form-control ng-untouched ng-pristine">



                                            <div id="show" style="visibility: hidden;" class="row mx-1mt-3 ">
                                                <img style="hight:30px;width:50px;margin-left: auto; margin-right: auto;  "
                                                    src="{{ asset('public/image/loading_grey_dots.gif') }}" alt="Wait" />
                                            </div>
                                            <div class=" font-bold text-start" id="errorsearch">
                                                <span class="text-danger" id="searchErrorMsg"></span>
                                            </div>
                                            <div id="showdata" class="row mx-1 mt-3 font-bold">


                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col"><button id="search-button" type="button"
                                        class="btn btn-warning">استعلام</button>
                                    <button type="button" onclick="fun();" data-bs-dismiss="modal"
                                        class="btn btn-secondary float-left">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </span>



            </div>


        </div>
    </div>

    <script src="{{ asset('public/image/scripts.746194727cbf2c07a056.js') }}"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script type="text/javascript">
        $('#search-button').on('click',function(){
        if(document.getElementById("show").style.visibility =="hidden"){
        document.getElementById("show").style.visibility = "visible";
        document.getElementById("errorsearch").style.visibility = "hidden";
        document.querySelector('#showdata').innerHTML ="";

    }else{
        document.getElementById("show").style.visibility = "hidden";
        document.getElementById("errorsearch").style.visibility = "visible";


    }

    $value= $('#search').val();
    console.log($value);
    $.ajax({
    type : 'get',
    dataType: "json",
    url :"{{route('user.search')}}",
    data:{'search':$value},
    success:function(data){
        console.log(data);
        myVar = setTimeout(showPage, 3000);
          function showPage() {

            document.getElementById("show").style.visibility = "hidden";
            document.getElementById("errorsearch").style.visibility = "hidden";
            document.querySelector('#showdata').innerHTML =data;
          }

    },
    error: function(response) {
        myVar = setTimeout(showPage, 3000);
        function showPage() {

            document.getElementById("show").style.visibility = "hidden";
            document.getElementById("errorsearch").style.visibility = "visible";
            $('#searchErrorMsg').text(response.responseJSON.errors.search);
        }



    },
    });
    })
    </script>

    <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function (content) {
        $("#exampleModal").modal('show');
       $value= $("#search").val(content);

       if(document.getElementById("show").style.visibility =="hidden"){
        document.getElementById("errorsearch").style.visibility = "hidden";
        document.getElementById("show").style.visibility = "visible";


    }else{
        document.getElementById("show").style.visibility = "hidden";
        document.getElementById("errorsearch").style.visibility = "visible";

    }
    $value= $('#search').val();
    console.log($value);
    $.ajax({
    type : 'get',
    dataType: "json",
    url :"{{route('user.search')}}",
    data:{'search':$value},
    success:function(data){

        console.log('im here in error');
        myVar = setTimeout(showPage, 3000);
          function showPage() {
            document.getElementById("show").style.visibility = "hidden";
            document.querySelector('#showdata').innerHTML =data;
            $('#searchErrorMsg').text(response.responseJSON.errors.search);

          }

    },
    error: function(response) {
        myVar = setTimeout(showPage, 3000);
        function showPage() {

            document.getElementById("show").style.visibility = "hidden";

        }



    },
    });

});
    Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else if (cameras.length > 1) {
            scanner.start(cameras[1]);
      }
      else{
        alert('Camera not found');
      }
    }).catch(function (e) {
        alert(e);
    });
    </script>

<script>
 function fun(){
    setTimeout(   location.reload(),2000);


    }
</script>
</x-guest-layout>
