@extends('admin.layouts')
@section('content')

    
    <div class="container">
        <h1>DASHBOARD</h1>
        <div class="row">
            {{-- <div id="piechart_3d" style="width: 500px; height: 500px;"></div> --}}
            {{-- <div id="curve_chart" style="width: 500px; height: 500px"></div> --}}
            <script type="text/javascript" defer>
                let analytics = <?php echo $gender; ?>;
                let application = <?php echo $application; ?>;
              </script>
              
              <div class="content-wrapper">
              
                  <section class="content">
                    
                      <div class="row" style ="margin-top:50px;">
                          <div class="col-md-6">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="panel-title">Pie chart</h3>
                                  </div>
                                  <div class="panel-body" align="center">
                                      <div id="pie_chart"></div>
                                  </div>
                              </div>
                          </div>
              
              
                          <div class="col-md-6">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="panel-title">Line chart</h3>
                                  </div>
                                  <div class="panel-body" align="center">
                                      <div id="linechart"></div>
                                  </div>
                              </div>
                          </div>
              
                      </div>
              
                    </section>
              </div>
        </div>
    </div>
        
@endsection


