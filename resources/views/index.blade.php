<!DOCTYPE html>
<html>

@include('template.header')

<body>
    
    <div id="wrapper">

        @include('template.nav_top')
        <!--/. NAV TOP  -->

        @include('template.nav_side')
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-list-alt fa-5x"></i>
                                <h3>36,752 </h3>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                To do

                            </div>
                        </div>
                    </div>
                </div>


                <!--Content goes here!-->


            </div>
            <!-- /. PAGE INNER  -->

        </div>
        <!-- /. PAGE WRAPPER  -->

    </div>
    <!-- /. WRAPPER  -->

    @include('template.footer')

</body>

</html>