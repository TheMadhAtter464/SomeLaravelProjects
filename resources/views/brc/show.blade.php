@extends('main')

@section('css')
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet"/>
  <style type="text/css" media="print">
    @media print
    {
       @page {
          margin-top: 0;
          margin-bottom: 0;
         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
         }
      }
    </style>
@stop

@section('content')

<div class="container">
  @foreach ($brcs->chunk(2) as $chunk)
      <div class="row">
        @foreach ($chunk as $brc)
        <div class="col-md-4">
            {!!'<img src="data:image/png;base64,' . DNS1D::getBarcodePNG("$brc->brcs", "C128A") . '" alt="barcode"   />'!!}
            <p>{{$brc->brcs}}</p>
        </div>
         @endforeach
      </div>
   @endforeach
</div>

@endsection
