@extends('layouts.app')
@section('title', 'Home')
@section('content')
<div class="content">
    <div class="col-10 offset-1 ">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <h3 class="text-center">Trabalho desenvolvido para disciplina tópicos especiais em programação.</h3>
            <small class="mt-4"><b>Developed by</b></small>
            <table class="table table-sm table-bordered table-striped mt-1">
                <thead>
                    <th>Nome</th>
                    <th>Matrícula</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Vitor Rodrigues Soares</td>
                        <td>2016123079</td>
                    </tr>
                    <tr>
                        <td>Caio Alves</td>
                        <td>2015122876</td>
                    </tr>
                    <tr>
                        <td>José Victor Guimarães Batista</td>
                        <td>2016180019</td>
                    </tr>
                    <tr>
                        <td>Rodrigo Lima</td>
                        <td>2016170797</td>
                    </tr>
                    <tr>
                        <td>Juan soares de Oliveira Ferreira</td>
                        <td>2017100030</td>
                    </tr>
                    <tr>
                        <td>Felipe Ramos Gomes</td>
                        <td>2016172142</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
