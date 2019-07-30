@extends('layout.master')

@section('title', 'User Page')

@section('table_name', 'User')

@section('table')
<table border=1>
            <thead>
                <th>ID</th>
                <th>Name</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Minh</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Curry</td>
                </tr>
            </tbody>
</table>
@endsection
@section('custom')
    @include('sections.custom')
@endsection