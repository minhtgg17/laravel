@extends('layout.master')

@section('title')
    Admin Page
@endsection


        <div>
            @section('table_name')
                Admin
            @endsection
        </div>
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
