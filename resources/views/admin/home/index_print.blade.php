@extends('admin.layouts.index')


@section('content')
<?php
$lang = App::getLocale();
$text = "text-left";
$pull = "pull-left";
$pulll = "pull-right";
if ($lang == "ar") {
    $text = "text-right";
    $pull = "pull-right";
    $pulll = "pull-left";
}
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{trans('admin.admin')}}
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{URL::to('admin')}}"><i class="fa fa-home"></i> {{trans('admin.home')}}</a></li>
    </ol>
</section>

<!-- Main content -->

<section class="content">

    <div class="row">
        @if (Session::has('message'))
        <div class="col-lg-12 col-xl-12">
            <div class="alert alert-success alert-dismissible">
                {{ Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        </div>
        @endif
    </div>




        <div class="row">
          <a target="_blank" href="#" class="btn btn-default">sdfcgvhbjnkml,;</a>
           
          <div class="col-lg-3 col-xs-6">
            <a href="{{URL::to('admin/products')}}">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$product}}</h3>

                <p>{{trans('admin.product')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

            </div>
            </a>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <a href="{{URL::to('admin/users')}}">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>{{trans('admin.registers')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             </div>
            </a>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{URL::to('admin/product_brand')}}">
            <div class="small-box bg-red">

              <div class="inner">
                <h3>{{$product_brand}}</h3>

                <p>{{trans('admin.brands')}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             </div>
            </a>
          </div>
          <!-- ./col -->
        </div>


        <div id="chart-container"></div>



        <script src="https://code.highcharts.com/highcharts.js"></script>
       

       <script>
         
            @if ($lang == "en") {
          var datas = <?php echo json_encode($datas)?>


          Highcharts.chart('chart-container',{

            title:{

              text:'New Order Growth,2021'

            },

            xAxis:{
              categories:['jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
            },
            yAxis:{
              title:{
                text:'Number of New Order'
              }
            },
            legend:{
              layout:'vertical',
              align:'right',
              verticalAlign:'middle'
            },
            plotOptions:{
            series:{
              allowPointSelect:true
            }

          },

              series:[{
                name:'New Order',
                data:datas
              }],

              responsive:{
                rules:[
                  {
                    condition:{
                      maxWidth:500
                    },
                    chartOptions:{
                      legend:{
                        layout:'horizontal',
                        align:'center',
                        verticalAlign:'bottom'
                      }
                    }




                  }
                ]
              }

          })
        }
          @endif

          @if ($lang == "ar") {
            var datas = <?php echo json_encode($datas)?>


           Highcharts.chart('chart-container',{

             title:{

               text:'نمو الطلبات ,2021'

             },

             xAxis:{
               categories:['ينابر','فبراير','مارس','ابريل','مايو','يونيه','يوليو','اغسطس','سبتمبر','اكتوبر','نوفمبر','ديسمبر']
             },
             yAxis:{
               title:{
                 text:'عدد الطلبات الجديدة'
               }
             },
             legend:{
               layout:'vertical',
               align:'right',
               verticalAlign:'middle'
             },
             plotOptions:{
             series:{
               allowPointSelect:true
             }

           },

               series:[{
                 name:'طلب جديد ',
                 data:datas
               }],

               responsive:{
                 rules:[
                   {
                     condition:{
                       maxWidth:500
                     },
                     chartOptions:{
                       legend:{
                         layout:'horizontal',
                         align:'center',
                         verticalAlign:'bottom'
                       }
                     }




                   }
                 ]
               }

           })


          }
          @endif
          </script>




</section>

<!-- /.content -->


@endsection


