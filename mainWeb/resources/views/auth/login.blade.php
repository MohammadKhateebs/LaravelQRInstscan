<x-guest-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <div class="container align-items-center border-radius:25px;">
        <div class="row mx-auto row-100 shadow-lg "
            style=" margin-top: 10%; margin-lift:auto;margin-right:auto;  border-radius:25px;">





            <div class="col-sm-6 right-col d-none d-xl-block d-lg-block"
                style="background:url({{ asset('public/image/loginImg.png') }}) ;border-radius:25px;">

            </div>
            <div class="col my-auto">
                <div class="row justify-content-center border-bottom mb-3 mx-auto text-center px-3" style="width: 55%;">
                    <img alt="" class="mb-3" src="{{ asset('public/image/logo.png') }}">
                </div>
                <form method="POST" action="{{ route('login.store') }}" class="ng-pristine ng-invalid ng-touched">
                    @csrf
                    <div class="row text-center justify-content-center mb-2 font-bold"> تسجيل
                        الدخول
                    </div>
                    <div class="row form-group w-50 mx-auto mb-1 text-right">
                        <input type="email" id="email" placeholder="أيميل المكلف" name="email"
                           class="form-control text-right ng-pristine ng-invalid ng-touched">
                    </div>
                    <div class="row form-group w-50 mx-auto mb-2">
                        <div class="input-group p-0">
                            <div class="input-group dir-ltr">


                            </div><input type="password" placeholder="كلمة المرور" name="password" id="password"
                                class="form-control text-end dir-ltr ng-untouched ng-pristine ng-invalid">

                            <!---->
                        </div>
                    </div>
                    <div class="row text-center justify-content-center mb-2 font-bold">
                        <x-button class="btn btn-success mt-2" style="width: 25%;">
                            {{ __('دخول') }}
                        </x-button>
                </form>
                <!---->
                <span class="mt-5 text-small text-center mx-auto w-100" dir="rtl">
                    الاستعلام عن
                    فاتورة مقاصة &nbsp;
                    <app-m-invoice-inquiry text="مبيعات">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="display: inline-block; color:green;" class="btn  btn-link font-bold m-0 p-0 pb-1"
                            id="mInquiry">
                            مبيعات
                        </button>


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
                                                        class="form-control ng-untouched ng-pristine ng-invalid">
                                                    <div id="show" style="visibility: hidden;" class="row mx-1mt-3 ">
                                                        <img style="hight:30px;width:50px;margin-left: auto; margin-right: auto;  "
                                                            src="{{ asset('public/image/loading_grey_dots.gif') }}"
                                                            alt="Wait" />
                                                    </div>
                                                    <div id="showdata" class="row mx-1 mt-3">


                                                    </div>
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col"><button id="search-button" type="button"
                                                class="btn btn-warning">استعلام</button>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="btn btn-secondary float-left">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </app-m-invoice-inquiry>
                    <span> &nbsp; / &nbsp; </span>
                    <!----> <a href="{{ route('user.buy') }}" type="button"
                        class="btn  btn-link font-bold m-0 p-0 pb-1">
                        مشتريات
                    </a>
                    <!---->
                </span>

            </div>

        </div>


    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="{{ asset('public/image/scripts.746194727cbf2c07a056.js') }}"></script>


    <script type="text/javascript">
        $('#search-button').on('click',function(){


            if(document.getElementById("show").style.visibility =="hidden"){
            document.getElementById("show").style.visibility = "visible";
            document.querySelector('#showdata').innerHTML ="";



        }else{
            document.getElementById("show").style.visibility = "hidden";
        }


        $value= $('#search').val();
        console.log($value);
        $.ajax({
        type : 'get',
        dataType: "json",
        url :"{{route('user.search')}}",
        data:{'search':$value},
        success:function(data){
            console.log('im here');
            myVar = setTimeout(showPage, 3000);
              function showPage() {

                document.getElementById("show").style.visibility = "hidden";
                document.querySelector('#showdata').innerHTML =data;
              }

        }
        });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#exampleModal").modal('show');
        });
    </script>
</x-guest-layout>
