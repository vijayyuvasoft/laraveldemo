@extends("layouts.app")


@section("content")

<div id="page_visit_div"></div>
<div id="coversion_rate_div"></div>
<div id="bounce_rate_div"></div>
<div id="total_value_div"></div>

<div class="container">
 {{!! Lava::render('AreaChart', 'page_visits_graph', 'page_visit_div') !!}}
 
 {{!! Lava::render('BarChart', 'coversion_rate_graph', 'coversion_rate_div') !!}}

 {{!! Lava::render('AreaChart', 'bounce_rate_graph', 'bounce_rate_div') !!}}

 {{!! Lava::render('BarChart', 'total_value_graph', 'total_value_div') !!}}
  
</div>
@endsection
