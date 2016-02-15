@extends('layouts.main')

@section('content')

<div class="row">
    <h1>All blocks:</h1>
</div>
<?php

if(DB::connection()->getDatabaseName())
{
   echo "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
}

?>

@stop

